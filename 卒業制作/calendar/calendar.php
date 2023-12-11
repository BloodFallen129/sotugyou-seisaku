<!DOCTYPE html>
<html>
<head>
    <!-- FullCalendarのリソースをインクルード -->
    <meta charset='utf-8' />
    <link href="packages/core/main.css" rel="stylesheet" />
    <link href="packages/daygrid/main.css" rel="stylesheet" />
    <link href="packages/timegrid/main.css" rel="stylesheet" />
    <link href="packages/list/main.css" rel="stylesheet" />
    <script src="packages/core/main.js"></script>
    <script src="packages/core/locales-all.js"></script>
    <script src="packages/interaction/main.js"></script>
    <script src="packages/daygrid/main.js"></script>
    <script src="packages/timegrid/main.js"></script>
    <script src="packages/list/main.js"></script>
    <link href="style.css" rel="stylesheet" />

    <script>
        var calendar = null;
        var today = new Date(); // 今日の日付を取得
        var selectedLocale = 'ja'; // デフォルトのロケール（日本語）

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            // カレンダーの初期化
            calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: selectedLocale,
                defaultDate: today,
                navLinks: true,
                businessHours: true,
                editable: true, // イベントをドラッグ可能にする
                eventTimeFormat: { hour: 'numeric', minute: '2-digit' },
                // イベントを追加するためのコード
                selectable: true,
                select: function (arg) {
                    var title = prompt('イベントのタイトル:');
                    if (title) {
                        var startTime = prompt('開始時間(HH:mm):');
                        var endTime = prompt('終了時間(HH:mm):');

                        if (startTime !== null && endTime !== null) {
                            var startDateTime = new Date(arg.start);
                            var startHour = parseInt(startTime.split(':')[0]);
                            var startMinute = parseInt(startTime.split(':')[1]);

                            var endDateTime = new Date(arg.start);
                            var endHour = parseInt(endTime.split(':')[0]);
                            var endMinute = parseInt(endTime.split(':')[1]);

                            startDateTime.setHours(startHour, startMinute);
                            endDateTime.setHours(endHour, endMinute);

                            calendar.addEvent({
                                title: title,
                                start: startDateTime,
                                end: endDateTime,
                                allDay: false // タイムスロットを使用する場合はfalse
                            });
                        }
                    }
                    calendar.unselect();
                },
                // イベントをクリックしたときのコード
                eventClick: function (info) {
                    if (confirm('このイベントを削除しますか？(Delete)')) {
                        info.event.remove();
                    }
                },
                // イベントをドラッグしたときのコード
                eventDrop: function (info) {
                    // イベントがドロップされた新しい日時を取得
                    var newStart = info.event.start;
                    var newEnd = info.event.end;

                    // 新しい日時をアラートで表示
                    alert('イベントが ' + newStart.toLocaleString() + ' から ' + newEnd.toLocaleString() + ' に移動されました');
                },
                // イベントをリサイズしたときのコード
                eventResize: function (info) {
                    var newStart = info.event.start;
                    var newEnd = info.event.end;

                    // 新しい時間をアラートで表示
                    alert('イベントが ' + newStart.toLocaleString() + ' から ' + newEnd.toLocaleString() + ' に延長されました');
                }
            });

            calendar.render();
        });
    </script>
</head>
<body>
    <a href="registration.php" id="login">新規登録</a>
    <img src="/images/logo3.png" alt="ロゴ画像" id="logo" />
    <div id='calendar'></div>
</body>
</html>
