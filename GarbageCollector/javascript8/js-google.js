var map;
var markers = [];
var markersNumber = 0;
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: new google.maps.LatLng(43.8510356, 18.3934051),
    mapTypeId: "roadmap"
  });

  var iconBase = "https://maps.google.com/mapfiles/kml/shapes/";
  var icons = {
    empty: {
      icon: {
        url: "images/open-trash-can.svg", // url
        scaledSize: new google.maps.Size(40, 40), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(0, 0), // anchor
        labelOrigin: new google.maps.Point(22, 50)
      }
    },
    between25_50: {
      icon: {
        url: "images/udner-50.svg", // url
        scaledSize: new google.maps.Size(40, 40), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(0, 0), // anchor
        labelOrigin: new google.maps.Point(22, 50)
      }
    },
    between50_80: {
      icon: {
        url: "images/50-and-above.svg", // url
        scaledSize: new google.maps.Size(40, 40), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(0, 0), // anchor
        labelOrigin: new google.maps.Point(22, 50)
      }
    },

    full: {
      icon: {
        url: "images/trash-can-with-cover.svg", // url
        scaledSize: new google.maps.Size(40, 40), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(0, 0), // anchor
        labelOrigin: new google.maps.Point(22, 50)
      }
    }
  };

  var features = [
    {
      position: new google.maps.LatLng(43.852875, 18.396528317),
      type: "empty",
      percent: "0"
    },
    {
      position: new google.maps.LatLng(43.852875, 18.396558317),
      type: "between25_50",
      percent: "32"
    },
    {
      position: new google.maps.LatLng(43.852875, 18.396538317),
      type: "between50_80",
      percent: "69"
    },
    {
      position: new google.maps.LatLng(43.852875, 18.3965283),
      type: "full",
      percent: "91"
    }
  ];

  // Create markers.

  insertData(43.852845, 18.3986518317, 56);
  insertData(43.852875, 18.396128317, 52);
  //   insertData(43.852845, 18.3986518317, 52);
  insertData(43.852175, 18.3966521317, 94);
  insertData(43.851075, 18.3986518612, 12);
  insertData(43.851125, 18.396428317, 33);
  insertData(43.852875, 18.39765283, 82);

  var arrayURL = "http://paviljondedinje.com/hackathon/getState.php";

  function insertData(longitude, latitude, percentage) {
    var features = [
      {
        position: new google.maps.LatLng(longitude, latitude),
        type:
          percentage <= 25
            ? "empty"
            : percentage > 25 && percentage <= 50
            ? "between25_50"
            : percentage > 50 && percentage <= 80
            ? "between50_80"
            : percentage > 80
            ? "full"
            : "",
        percent: percentage
      }
    ];

    features.forEach(function(features) {
      var marker = new google.maps.Marker({
        position: features.position,
        icon: icons[features.type].icon,
        label: {
          text: features.percent + "%",
          color: "orange",
          fontSize: "14px",
          fontWeight: "bold"
        },
        map: map
      });
      markers[markersNumber] = marker;
      markersNumber++;
    });

    return features;
  }

  //setInterval(updateMainTrashContainer(),2000);
}

function updateMainTrashContainer() {
  if (
    markers != undefined &&
    markers[0] != undefined &&
    procenatGlavnogKontenjera != undefined
  ) {
    var icons2 = {
      empty: {
        icon: {
          url: "images/open-trash-can.svg", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0, 0), // origin
          anchor: new google.maps.Point(0, 0), // anchor
          labelOrigin: new google.maps.Point(22, 50)
        }
      },
      between25_50: {
        icon: {
          url: "images/udner-50.svg", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0, 0), // origin
          anchor: new google.maps.Point(0, 0), // anchor
          labelOrigin: new google.maps.Point(22, 50)
        }
      },
      between50_80: {
        icon: {
          url: "images/50-and-above.svg", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0, 0), // origin
          anchor: new google.maps.Point(0, 0), // anchor
          labelOrigin: new google.maps.Point(22, 50)
        }
      },

      full: {
        icon: {
          url: "images/trash-can-with-cover.svg", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0, 0), // origin
          anchor: new google.maps.Point(0, 0), // anchor
          labelOrigin: new google.maps.Point(22, 50)
        }
      }
    };

    function vratiTip() {
      return procenatGlavnogKontenjera <= 25
        ? "empty"
        : procenatGlavnogKontenjera > 25 && procenatGlavnogKontenjera <= 50
        ? "between25_50"
        : procenatGlavnogKontenjera > 50 && procenatGlavnogKontenjera <= 80
        ? "between50_80"
        : procenatGlavnogKontenjera > 80
        ? "full"
        : "";
    }

    markers[0].icon = icons2[vratiTip()].icon;
    markers[0].label.text = procenatGlavnogKontenjera + "%";
    markers[0].setMap(null);
    markers[0].setMap(map);
  }
}

setInterval(updateMainTrashContainer, 1000);
