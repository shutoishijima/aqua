<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
        <script type="text/javascript" src={{ asset('js/main.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/locales-all.js') }}></script>
        <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            locale: 'ja',
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            selectMirror: true,

            @if ($users[0]->user_id == 0)
                editable: true,
                selectable: true,    
            @endif       

            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
                }
                calendar.unselect()
            },
            eventClick: function(arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                }
            },
            eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
            events: [
                @foreach($schedules as $schedule)
                    {
                    title: '{{$schedule->client_schedule}}',
                    start: '{{$schedule->start_date}}',
                    end: '{{$schedule->end_date}}'
                    },
                @endforeach
            ]
            });

            calendar.render();
        });
        </script>
        
    </head>
    <body class="main">
    @component('parts.header')
    @endcomponent

        <div class="client-name">
            @foreach ($clients as $client)
                @if ($client->client_id == $client_id)
                    <div>
                        <p>{{ $client->client_name }}様のスケジュール</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div id='calendar'></div>

        <div class="client-memo">
            <div class="contents-title">
                <p class="center">MEMO</p>
            </div>

            @foreach ($clients as $client)
                @if ($client->client_id == $client_id)
                    <div>
                        {{ $client->client_memo }}
                    </div>
                @endif
            @endforeach
        </div>

        <div class="myclient c-myclient">
            <div class="contents-title">
                <p class="center">進行中クライアント様一覧</p>
            </div>

            <div class="client-file">
                <div class="file">
                    <div class="file-name center active-color">
                        <p class="file-name-color active-p-color">不動産</p>
                    </div>
                    <div class="file-in in1">
                        @foreach ($clients as $client)
                            @if ($client->client_category1 == 'y')
                                <p>
                                    <a href="{{$client->client_id}}">
                                        {{ $client->client_name }}
                                    </a>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="file">
                    <div class="file-name center file2">
                        <p class="file-name-color">人材</p>
                    </div>
                    <div class="file-in in2">
                        @foreach ($clients as $client)
                            @if ($client->client_category2 == 'y')
                                <p>
                                    <a href="{{$client->client_id}}">
                                        {{ $client->client_name }}
                                    </a>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="file">
                    <div class="file-name center file3">
                        <p class="file-name-color">アポイント</p>
                    </div>
                    <div class="file-in in3">
                        @foreach ($clients as $client)
                            @if ($client->client_category3 == 'y')
                                <p>
                                    <a href="{{$client->client_id}}">
                                        {{ $client->client_name }}
                                    </a>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if ($users[0]->user_id == 1)
            <div class="hide-tool">
                <div class="contents-title">
                    <p class="center">管理者限定ツール</p>
                </div>
                <div class="csv-com">
                    <p>どちらともcsvファイルを選択してください。</p>
                    <p>クライアントの登録とスケジュールの登録どちらの登録をしたいのか再度ご確認してください。</p>
                </div>
                <div class="csv-form flex">
                    <div class="csv-left">
                        <p class="center">クライアント登録</p>
                        <form action="{{ url('client_csv_upload') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" name="csv" />
                            <br/>
                            <button type="submit">CSV取込み</button>
                        </form>
                    </div>

                    <div class="csv-right">
                        <p class="center">スケジュール登録</p>
                        <form action="{{ url('csv_upload') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" name="csv" />
                            <br/>
                            <button type="submit">CSV取込み</button>
                        </form>
                    </div>
                </div>  
            </div>  
        @endif  
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>
