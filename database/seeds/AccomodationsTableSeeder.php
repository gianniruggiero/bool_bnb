<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
use App\AccomodationType;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;


class AccomodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // accomodations faker ROMA
        $recordsNumber = 50;

        // stringe per Title accomodations a Roma
        $typeTitleRoma = [
            "Appartamento in centro a Roma",
            "Stanza in appartamento a Roma",
            "Villa a Roma",
            "Casa indipendenete a Roma",
            "Loft a Roma",
            "Posto letto in ostello a Roma"
        ];

        // stringe per Description accomodations a ROMA
        $typeDescriptionRoma = [
            "Appartamento accogliente posto al terzo piano con ascensore in un palazzo d'epoca in zona storica e centralissima. Si tratta di una delle più belle e conosciute via dello shopping, raggiungibile in pochi minuti tramite le fermate della metro A - Flaminio e Spagna. Da qui sono raggiungibili a piedi tantissimi luoghi d'interesse storico-culturali. L'appartamento presenta un arredamento classico, è composto da un soggiorno, sala da pranzo con angolo cottura, una camera da letto e un bagno.",
            
            "Bellissimo appartamento con tre ampie camere, ottima base di partenza per viaggiare a Roma e visitare la città con gli amici. Situtato nel centro di Roma, a cinque minuti a piedi dal Colosseo, la metropolitana è a 100 metri di distanza, a piedi dalla stazione ferroviaria per 10 minuti. Comodo supermercato nei dintorni. Un ristorante centenario chiamato Vecchia Roma è proprio dietro l'angolo. Stiamo aspettando il tuo arrivo nell'appartamento, buon viaggio.",
            
            "Dopo anni di affitti attraverso canali privati, debutta su Boolbnb l'elegante villino liberty a pochi passi da Villa Borghese, nel cuore dei Parioli, considerata la zona residenziale piú esclusiva di Roma. Situato in una strada silenziosa e circondato da un ampio e curato giardino, il villino si sviluppa su quattro piani. Al piano terra si trovano l'ingresso, un ampio e luminoso salone con zona pranzo, salottino TV nonché una zona verandata che costituisce un'ulteriore area living e dining, collegata al giardino.",

            "Immagina di avere una bella casa indipendente tutta per te. Camera da letto, cucina, soggiorno, bagno. Immagina di uscire e ritrovarti in un ambiente rurale... e sei a solo una corsa in autobus a pochi minuti dal centro della città. La casa ha il suo ingresso privato, all'interno di un ampio giardino. È completamente arredata, con bagno privato completo di doccia e bidet alla francese. C'è una nuova cucina completamente attrezzata e un salone dove si può gustare la cena o un pranzo al sole in giardino. È una zona di Roma ricca di ville in stile 'liberty'.",

            "Il Loft è perfetto per un soggiorno Romantico e divertente, gode dei caratteristici soffitti in legno del quartiere, schermo piatto, un bagno confortevole e completo di tutto, la cucina è ben attrezzata. L'appartamento è situato nel cuore del centro storico di Roma, a Trastevere. Oltre all'atmosfera culturale e folcloristica dell'area, puoi goderti molti bei negozi, ristoranti, pub, club, lounge bar, panetterie, supermercati e lavanderie.",

            "L'ostello è dotato di un bar, un salone in comune, un giardino e la connessione Wi-Fi gratuita. La struttura dista circa 3 km dal Foro Romano, 4 km dal Colle Palatino e 3 km da Palazzo Venezia. La struttura si trova nel quartiere di Trastevere, a 4 km da Largo di Torre Argentina. Le camere dell'ostello sono dotate di scrivania, aria condizionata e bagno privato. Presso la struttura potrete giocare a ping pong e a freccette. L'aeroporto più vicino è quello di Roma Ciampino."
        ];

        // stringe per Title accomodations a MILANO
        $typeTitleMilano = [
            "Appartamento in centro a Milano",
            "Stanza in appartamento a MIlano",
            "Villa a Milano",
            "Casa indipendenete a Milano",
            "Loft luminoso a Milano",
            "Posto letto in ostello a Milano"
        ];

        // stringe per Description accomodations a MILANO
        $typeDescriptionMilano = [
            "Appartamento accogliente posto al terzo piano con ascensore in un palazzo d'epoca in zona storica e centralissima. Si tratta di una delle più belle e conosciute via dello shopping, raggiungibile in pochi minuti tramite le fermate della metro Gialla. Da qui sono raggiungibili a piedi tantissimi luoghi d'interesse storico-culturali. L'appartamento presenta un arredamento classico è composto da un soggiorno, sala da pranzo con angolo cottura, una camera da letto e un bagno.",
            
            "Bellissimo appartamento con tre ampie camere, ottima base di partenza per viaggiare a Milano, visitare la città con gli amici. Appartamento nel centro di Milano, a cinque minuti a piedi dal Duomo, la metropolitana è a 100 metri di distanza, la stazione ferroviaria a 10 minuti a piedi. Comodo supermercato nei dintorni. Un ristorante centenario chiamato Vecchio Mulino è proprio dietro l'angolo. Stiamo aspettando il tuo arrivo nell'appartamento, buon viaggio.",
            
            "Dopo anni di affitti attraverso canali privati, debutta su Boolbnb l'elegante villino liberty a pochi passi da Villa Litta, considerata la zona residenziale piú esclusiva di MIlano. Situato in una strada silenziosa e circondato da un ampio e curato giardino, il villino si sviluppa su tre piani. Al piano terra si trovano l'ingresso, un ampio e luminoso salone con zona pranzo, salottino TV nonché una zona verandata che costituisce un'ulteriore area living e dining, collegata al giardino.",

            "Immagina di avere una bella casa indipendente tutta per te. Camera da letto, cucina, soggiorno, bagno. Immagina di uscire e ritrovarti in un ambiente rurale... e sei a solo una corsa in autobus a pochi minuti dal centro della città. La casa ha il suo ingresso privato, è all'interno di un ampio giardino. È completamente arredata, con bagno privato completo di doccia e bidet alla francese. C'è una nuova cucina completamente attrezzata e un salone dove si può gustare la cena o un pranzo al sole in giardino. È una zona di Milano ricca di ville in stile 'liberty'.",

            "Il Loft è perfetto per un soggiorno romantico e divertente, gode dei caratteristici soffitti in legno del quartiere, schermo piatto, un bagno confortevole e completo di tutto. La cucina è ben attrezzata. L'appartamento è situato nel cuore dei Navigli a Milano. Oltre all'atmosfera culturale e folcloristica dell'area, puoi goderti molti bei negozi, ristoranti, pub, club, lounge bar, panetterie, supermercati e lavanderie.",

            "L'ostello offre un bar, un salone in comune, un giardino e la connessione Wi-Fi gratuita. La struttura dista circa 3 km da Piazza Duomo. La struttura si trova nel quartiere di Lambrate, a 4 km dalla Stazione FS di Prota Garibaldi. Le camere dell'ostello sono dotate di scrivania, aria condizionata e bagno privato. Presso la struttura potrete giocare a ping pong e a freccette. L'aeroporto più vicino è quello di Milano Malpensa."
        ];        


        // Istruzioni per gestione immagini nella create / update
        // asset('storage/file.txt')
        // Storage::disk('local')->put('file.txt', 'Contents');
        // $url = Storage::url('file.jpg');
        // Storage::move('hodor/oldfile-name.jpg', 'hodor/newfile-name.jpg');
        // $files = Storage::files($directory);
            
        // ************** ROMA **************
        // Creiamo $recordsNumber record in Accomodations
        for ($i=0; $i < $recordsNumber ; $i++) {
            // Prendiamo un record casuale da user per estrapolare l'id
            $userTemp = User::inRandomOrder()->first();
            // Creiamo una nuova istanza di accomodation
            $newAccomodation = new Accomodation;
            // Riempiamo tutti i campi di Accomodation
            $newAccomodation->user_id = $userTemp->id;
            $newAccomodation->type_id = AccomodationType::inRandomOrder()->first()->id;
            $newAccomodation->title = $typeTitleRoma [$newAccomodation->type_id - 1];
            $newAccomodation->description = $typeDescriptionRoma [$newAccomodation->type_id - 1];
            $newAccomodation->cover_image = 'http://localhost:8000/storage/cover_image/cover'.($i+1).'.jpeg';
            $newAccomodation->country = "Italia";
            $newAccomodation->region = "Lazio";
            $newAccomodation->city = "Roma";
            $newAccomodation->address = "Via dei Ciclamini, ".$i;
            $newAccomodation->zip_code = "00100";
            // Riempiamo i campi a seconda del type dell'accomodation                
            switch ($newAccomodation->type_id) {
                case 1:
                    // Accomodation
                    $newAccomodation->beds = $faker->numberBetween(1, 5);
                    $newAccomodation->rooms = $faker->numberBetween(1, 3);
                    $newAccomodation->toilets = $faker->numberBetween(1, 2);
                    $newAccomodation->square_meters = $faker->numberBetween(80, 200);
                    $newAccomodation->price = intval($faker->randomFloat(2, 120, 200));
                    break;
                
                case 2:
                    // Room
                    $newAccomodation->beds = $faker->numberBetween(1,2);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = 1;
                    $newAccomodation->square_meters = $faker->numberBetween(9, 30);
                    $newAccomodation->price = intval($faker->randomFloat(2, 30, 150));
                    break;

                case 3:
                    // Mansion
                    $newAccomodation->beds = $faker->numberBetween(4,10);
                    $newAccomodation->rooms = $faker->numberBetween(5,15);
                    $newAccomodation->toilets = $faker->numberBetween(2,4);
                    $newAccomodation->square_meters = $faker->numberBetween(200, 700);
                    $newAccomodation->price = intval($faker->randomFloat(2, 400, 900));
                    break;

                case 4:
                    // House
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = intval($faker->randomFloat(2, 120, 300));
                    break;

                case 5:
                    // Loft
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = intval($faker->randomFloat(2, 150, 400));
                    break;

                case 6:
                    // Hostel
                    $newAccomodation->beds = $faker->numberBetween(1,6);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = $faker->numberBetween(0,1);
                    $newAccomodation->square_meters = $faker->numberBetween(15, 30);
                    $newAccomodation->price = intval($faker->randomFloat(2, 30, 70));
                    break;
            }

            // Coordinate +/- 40 km. dal centro di Roma
            $latMin= 41.89938; 
            $latMax= 41.90398;
            $lgtMin= 12.48484;
            $lgtMax= 12.51239;

            // latitude e longitude, che stiamo nell'intervallo predefinito per la zona di Roma
            $newAccomodation->latitude = $faker->latitude($latMin, $latMax);
            $newAccomodation->longitude = $faker->longitude($lgtMin, $lgtMax);
            // Riempie temporaneamente lo slug, per eivtare di avere errore al primo save() del record
            // Lo slug effettivo verrà assgnato dopo il primo save(), quando sarà stato creato l'id dal DB,
            // id che concateniamo in coda allo slug del titolo, per fare in modo che lo slug sia univoco
            $newAccomodation->slug = $i;
            // Salviamo il tutto 1°
            $newAccomodation->save();
            // Creiamo lo slug partendo dal title e aggiungendo in coda l'id (per essere sicuri che sia univoco)
            $newAccomodation->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $newAccomodation->title)))."-".$newAccomodation->id;
            // Salviamo di nuovo il record, per salvare lo slug appena creato
            $newAccomodation->save();
        }

        // ************** MILANO **************
        // Creiamo $recordsNumber record in Accomodations
        for ($i=0; $i < $recordsNumber ; $i++) {
            // Prendiamo un record casuale da user per estrapolare l'id
            $userTemp = User::inRandomOrder()->first();
            // Creiamo una nuova istanza di accomodation
            $newAccomodation = new Accomodation;
            // Riempiamo tutti i campi di Accomodation
            $newAccomodation->user_id = $userTemp->id;
            $newAccomodation->type_id = AccomodationType::inRandomOrder()->first()->id;
            $newAccomodation->title = $typeTitleMilano [$newAccomodation->type_id - 1];
            $newAccomodation->description = $typeDescriptionMilano [$newAccomodation->type_id - 1];
            $newAccomodation->cover_image = 'http://localhost:8000/storage/cover_image/cover'.($i+1).'.jpeg';
            $newAccomodation->country = "Italia";
            $newAccomodation->region = "Lombardia";
            $newAccomodation->city = "Milano";
            $newAccomodation->address = "Via Libertà, ".$i;
            $newAccomodation->zip_code = "20122";
            // Riempiamo i campi a seconda del type dell'accomodation                
            switch ($newAccomodation->type_id) {
                case 1:
                    // Accomodation
                    $newAccomodation->beds = $faker->numberBetween(1, 5);
                    $newAccomodation->rooms = $faker->numberBetween(1, 3);
                    $newAccomodation->toilets = $faker->numberBetween(1, 2);
                    $newAccomodation->square_meters = $faker->numberBetween(80, 200);
                    $newAccomodation->price = $faker->randomFloat(0, 120, 200);
                    break;
                
                case 2:
                    // Room
                    $newAccomodation->beds = $faker->numberBetween(1,2);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = 1;
                    $newAccomodation->square_meters = $faker->numberBetween(9, 30);
                    $newAccomodation->price = $faker->randomFloat(0, 30, 150);
                    break;

                case 3:
                    // Mansion
                    $newAccomodation->beds = $faker->numberBetween(4,10);
                    $newAccomodation->rooms = $faker->numberBetween(5,15);
                    $newAccomodation->toilets = $faker->numberBetween(2,4);
                    $newAccomodation->square_meters = $faker->numberBetween(200, 700);
                    $newAccomodation->price = $faker->randomFloat(0, 400, 900);
                    break;

                case 4:
                    // House
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(0, 120, 300);
                    break;

                case 5:
                    // Loft
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(0, 150, 400);
                    break;

                case 6:
                    // Hostel
                    $newAccomodation->beds = $faker->numberBetween(1,6);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = $faker->numberBetween(0,1);
                    $newAccomodation->square_meters = $faker->numberBetween(15, 30);
                    $newAccomodation->price = $faker->randomFloat(0, 30, 70);
                    break;
            }

            // Coordinate +/- 30 km. dal centro di Milano
            $latMin= 45.49232; 
            $latMax= 45.49809;
            $lgtMin= 9.14614;
            $lgtMax= 9.20107;

            // latitude e longitude, che stiamo nell'intervallo predefinito per la zona di Roma
            $newAccomodation->latitude = $faker->latitude($latMin, $latMax);
            $newAccomodation->longitude = $faker->longitude($lgtMin, $lgtMax);
            // Riempie temporaneamente lo slug, per eivtare di avere errore al primo save() del record
            // Lo slug effettivo verrà assgnato dopo il primo save(), quando sarà stato creato l'id dal DB,
            // id che concateniamo in coda allo slug del titolo, per fare in modo che lo slug sia univoco
            $newAccomodation->slug = $i;
            // Salviamo il tutto 1°
            $newAccomodation->save();
            // Creiamo lo slug partendo dal title e aggiungendo in coda l'id (per essere sicuri che sia univoco)
            $newAccomodation->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $newAccomodation->title)))."-".$newAccomodation->id;
            // Salviamo di nuovo il record, per salvare lo slug appena creato
            $newAccomodation->save();
        }

    }
}
