<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>map</title>
    </head>
    <body>
        <!-- GoogleMap -->
        <div id="google_map" style="height:500px">地図</div>
        <!-- 初期表示時の座標をhidden設定 -->
        <input type="hidden" id="init_lat" value="{{ $init_lat }}" />
        <input type="hidden" id="init_lng" value="{{ $init_lng }}" />

        <script>
            // Map初期表示
            function initMap() {
                console.log("initMap");

                // マップ初期表示の位置設定
                let target = document.getElementById('google_map');
                let lat = "{{ $init_lat }}";
                let lng = "{{ $init_lng }}";
                let myLatlng = new google.maps.LatLng(lat, lng);

                // マップ表示
                let map = new google.maps.Map(target, {
                    center: myLatlng,
                    zoom: 15,
                });

                // マーカーの初期プロパティを指定
                let marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    //ドラッグを許可
                    draggable: true,
                });

                // クリックイベント
                google.maps.event.addListener(map, 'click', event => clickListener(event, map));
                // ドラッグ＆ドロップ
                google.maps.event.addListener(marker, 'dragend', event => dragendListener(event, map));
            };

            // クリックイベント
            function clickListener(event, map) {
                let lat = event.latLng.lat();
                let lng = event.latLng.lng();
                let marker = new google.maps.Marker({
                    position: {lat, lng},
                    map,
                    // ドラッグを許可
                    draggable: true,
                });
                console.log("クリック lat:" + lat + ", lng:" + lng);
            }

            // ドラッグ＆ドロップ
            function dragendListener(event, map) {
                let lat = event.latLng.lat();
                let lng = event.latLng.lng();
                let marker = new google.maps.Marker({
                    position: {lat, lng},
                    map
                });
                console.log("ドラッグ lat:" + lat + ", lng:" + lng);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAh7gzUet8-u1SjeAFURskRWYsHOjJZdgk&callback=initMap" async defer></script>
    </body>
</html>