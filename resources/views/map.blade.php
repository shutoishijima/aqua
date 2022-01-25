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

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.js" integrity="sha256-FA/0OOqu3gRvHOuidXnRbcmAWVcJORhz+pv3TX2+U6w=" crossorigin="anonymous"></script>
        <script>
            let map;
            let marker = [];
            let infoWindow = [];
            let openWindow;

            // 初期表示
            function initMap() {
                console.log("initMap");

                // 初期値座標(文字列→浮動小数点)
                let init_lat = parseFloat($("#init_lat").val());
                let init_lng = parseFloat($("#init_lng").val());

                // マップ初期表示の位置設定(位置情報取得可能時は、後で変更)
                let target = document.getElementById('google_map');
                let centerp = {
                        lat: init_lat,
                        lng: init_lng
                    };

                // マップ表示
                map = new google.maps.Map(target, {
                    center: centerp,
                    zoom: 15,
                });
            };

            $(document).ready(function() {
                // Geolocation API判定
                if (navigator.geolocation) {
                    let options = {
                        // enableHighAccuracyは、GPSの精度でtrueかfalseをセットする
                        // trueだと精度が高くなる
                        enableHighAccuracy: true, 
                        //timeoutは、タイムアウト時間でミリ秒単位
                        timeout: 1000,
                        // maximumAgeは、キャッシュ有効時間でミリ秒で表す
                        // 0の場合、常に最新の情報を取得する
                        maximumAge: 0
                    };

                    // 現在位置を取得する
                    navigator.geolocation.getCurrentPosition(success, error, options); 
                }
            });

            // 現在位置取得の成功時
            function success(position) {
                console.log("success");
                let crd = position.coords;
                console.log(crd);

                // 現在位置の座標
                let now_lat = crd.latitude;
                let now_lng = crd.longitude;

                /**
                * ★重要★
                * 現在位置で地図の中心位置を再設定
                */
                let latlng = new google.maps.LatLng(now_lat, now_lng);
                map.setCenter(latlng);

                // 送信データ
                let sendData = {
                    "success_flg": true,    // 現在地取得OK
                    "lat": now_lat,
                    "lng": now_lng
                };

                // ajaxセットアップ
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                // ajax送信
                $(function() {
                    $.ajax({
                        type: "POST",
                        url: "map_ajax",
                        dataType: "json",
                        data: sendData,
                        success: function(data){
                            console.log(data);
                            setMarker(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown){
                            alert('Error : ' + errorThrown);
                        }
                    });
                });
            };

            // 現在位置取得の失敗時
            function error(err) {
                console.log("error");

                // デフォルト値の座標
                let init_lat = $("#init_lat").val();
                let init_lng = $("#init_lng").val();

                // 送信データ
                let sendData = {
                    "success_flg": false,    // 現在地取得NG
                    "lat": init_lat,
                    "lng": init_lng
                };

                // ajaxセットアップ
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                // ajax送信
                $(function() {
                    $.ajax({
                        type: "POST",
                        url: "map_ajax",
                        dataType: "json",
                        data: sendData,
                        success: function(data){
                            console.log(data);
                            setMarker(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown){
                            alert('Error : ' + errorThrown);
                        }
                    });
                });
            };

            // 地図のマーカ設定
            function setMarker(markerData) {
                console.log(markerData);

                //マーカー生成
                let icon;

                for (let i = 0; i < markerData.length; i++) {

                    let latNum = parseFloat(markerData[i]['lat']);
                    let lngNum = parseFloat(markerData[i]['lng']);

                    // マーカー位置セット
                    let markerLatLng = new google.maps.LatLng({
                        lat: latNum,
                        lng: lngNum
                    });

                    // マーカーアイコンのセット
                    icon = {
                        url: "{{ asset('icon/icon.png')}}",
                        scaledSize: new google.maps.Size(40, 40),
                        anchor: new google.maps.Point(20, 40)
                    };

                    // マーカーのセット
                    marker[i] = new google.maps.Marker({
                        position: markerLatLng,          // マーカーを立てる位置を指定
                        map: map,                        // マーカーを立てる地図を指定
                        icon: icon                       // アイコン指定
                    });

                    // 吹き出しの追加
                    infoWindow[i] = new google.maps.InfoWindow({
                        content: markerData[i]['name'] + '<br><br>' + markerData[i]['text']
                    });

                    // マーカーにクリックイベントを追加
                    markerEvent(i);
                }
            }

            // マーカイベントの追加
            function markerEvent(i) {
                marker[i].addListener('click', function() {
                    myclick(i);
                });
            }

            // マーカのクリック処理
            function myclick(i) {
                if (openWindow) {
                    openWindow.close();
                }
                infoWindow[i].open(map, marker[i]);
                openWindow = infoWindow[i];
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAh7gzUet8-u1SjeAFURskRWYsHOjJZdgk&callback=initMap" async defer></script>
    </body>
</html>
