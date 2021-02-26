
var latitude = document.getElementById("latitude").value;
var longitude = document.getElementById("longitude").value; 
var title = document.getElementById("title").value;


var map = tt.map({
    key: '5f9vpvhd3dCu5qyQPFDmWnkS1fQQ1Yrg',
    container: 'map',
    dragPan: !isMobileOrTablet(),
    center: [longitude, latitude],
    zoom: 12
});


// Define your product name and version.
tt.setProductInfo('<boolBnB>', '<1.0>');


// Zoom Controls & Map rotation controls
map.addControl(new tt.NavigationControl());
// Full screen map control
// map.addControl(new tt.FullscreenControl());

window.isMobileOrTablet = window.isMobileOrTablet || isMobileOrTablet;

// Marker creation: accomodation's position on the map
createMarker('accident.colors-white.svg', [longitude, latitude], '#20b2aa', title);


function createMarker(icon, position, color, popupText) {
    var markerElement = document.createElement('div');
    markerElement.className = 'marker';

    var markerContentElement = document.createElement('div');
    markerContentElement.className = 'marker-content';
    markerContentElement.style.backgroundColor = color;
    markerElement.appendChild(markerContentElement);

    var iconElement = document.createElement('div');
    iconElement.className = 'marker-icon';
    // iconElement.style.backgroundImage =
    //     'url(https://api.tomtom.com/maps-sdk-for-web/cdn/static/' + icon + ')';
    iconElement.style.backgroundImage ='url(http://localhost:8000/storage/map_image/map_icon_boolbnb.png)';
    markerContentElement.appendChild(iconElement);

    var popup = new tt.Popup({offset: 30}).setText(popupText);
    // add marker to map
    new tt.Marker({element: markerElement, anchor: 'bottom'})
        .setLngLat(position)
        .setPopup(popup)
        .addTo(map);
};

// function copied from http://detectmobilebrowsers.com/
function isMobileOrTablet() {
    var check = false;
    // eslint-disable-next-line
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};

function changeLocation() {

    // Change location with flight animation:
    map.flyTo({center: [longitude, latitude], zoom: 12});

    // Change location with ease animation:
    // map.easeTo({center: point, zoom: 9});

    // Change location without animation:
    // map.jumpTo({center: point, zoom: 9});

}







// Test
//createMarker('accident.colors-white.jpg', [-78.17043537427266, 36.31817544230164], '#20b2aa', 'Villa in Centro a Roma');
// createMarker('accident.colors-white.svg', [-120.72217631449985, 42.73919549715691], '#20b2aa', 'SVG icon');
// createMarker('accident.colors-white.png', [-99.98580752275456, 33.43211082128627], '#20b2aa', 'PNG icon');

// iconElement.style.backgroundImage =
// 'url(http://localhost:8000/storage/map_image/map_icon.png)';



document.getElementById("home_btn").addEventListener("click", function(){

    changeLocation();   
    
});

