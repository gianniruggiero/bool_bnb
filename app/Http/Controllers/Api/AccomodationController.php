<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accomodation;
use App\UserMessage;


class AccomodationController extends Controller
{

    public function search(Request $request){

        // Prendiamo tutti i dati
        $data = $request->all();
        // Array contente tutte le accomodation filtrate
        $accomodationsFiltered = [];

        // Array che conterrà le distanze da ordinare
        $distances = [];

       // Array di accomodation ordinate per distanza dalla piu vicina alla piu lontana dal punto di ricerca
        $accomodationsFilteredAsc = [];

        // Array per i services
        $accomodationServicesFiltered = [];
        // Array Che riempieremo alla fine con tutti i campi del JSON
        $accomodationsFilteredJSON = [];
        // Prendiamo tutti gli appartamenti secondo i parametri richiesti dall'utente(cha saranno i requisiti minimi)
        $accomodationsToFilter = Accomodation::where("beds", ">=", $data['beds'])
        ->where("toilets", ">=", $data['toilets'])
        ->where("rooms", ">=", $data['rooms'])
        ->where("visible", true)
        ->get();

        if(count($request->services) != 0)
        {
          $requiredServices = count($request->services);
          foreach($accomodationsToFilter as $accomodation)
          {
            $findService = 0;
            foreach($data['services'] as $service)
            {
              foreach($accomodation->services as $accomodation_service)
              {
                if($accomodation_service->service_name == $service)
                {
                  $findService ++;
                }
              }
            }

            if($findService >= $requiredServices)
            {
              $accomodationServicesFiltered[] = $accomodation;
            }
          }
        }

        foreach ($accomodationServicesFiltered as $accomodation) {
            $distance = $this->distance($accomodation->latitude, $accomodation->longitude, $data['latitude'], $data['longitude']);
            $distance = round($distance,1);
            if ($distance<=$data['radius']) {
                $tempAccomodationsFilteredJSON = [
                    'accomodation' => $accomodation,
                    'distance' => $distance,
                    'services' => $accomodation->services,
                    'type' => $accomodation->accomodation_type
                ];

                $distances[] = $distance;

                $accomodationsFilteredJSON[] = $tempAccomodationsFilteredJSON;
            }
        }

        // Ordiniamo in base alla distanza
        asort($distances);


        // Cicliamo sull'array delee distanze
        foreach ($distances as $key => $value) {
          // Inseriamo il relativo valore in maniera crescente all'interno di $accomodationsFilteredAsc
          $accomodationsFilteredAsc[] = $accomodationsFilteredJSON[$key];
        }

        // Assegnamo l'array ordinato ad $accomodationsFiltered
        $accomodationsFilteredJSON = $accomodationsFilteredAsc;
        return response()->json($accomodationsFilteredJSON);
    }

    public function message_send(Request $request)
    {
        
          // Trasferiamo in $data tutto i dati che sono stati inseriti all'interno del form
        $data = $request->all();
        
        // Validazione dei dati ricevuti dal form con $request
        $request->validate ([
          'accomodation_id'=>'required',
          'email'=>'required|max:100',
          'nickname'=>'max:50',
          'text_message'=>'required|max:300',
        ]);
       

        // Creiamo una nuova istanza di UserMessage
        $newMessage = new UserMessage();
        // Riempiamo tutti i campi del nuovo record della tabella accomodations
        $newMessage->accomodation_id = $data['accomodation_id'];
        $newMessage->email = $data['email'];
        $newMessage->nickname = $data['nickname'];
        $newMessage->text_message = $data['text_message'];

        // Salviamo il nuovo record nella tabella accomodations
        $result = $newMessage->save();
        // $result = null;
        if ($result) {
          return response()->json($newMessage, 201);
        } else {
          $answer = ["result"=>"non è stato possibile salvare il messaggio"];
          return response()->json($answer, 500);
        }

        // $message = UserMessage::create($request->all());
        // return response()->json($message, 201);

    }

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
        //echo ' '.$km;
        return $km;
    }
}
