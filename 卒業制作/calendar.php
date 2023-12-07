<!DOCTYPE html>
<html>
<head>
    <!-- FullCalendarのリソースをインクルード -->
    <meta charset='utf-8' />
    <link href="calendar/packages/core/main.css" rel="stylesheet" />
    <link href="calendar/packages/daygrid/main.css" rel="stylesheet" />
    <link href="calendar/packages/timegrid/main.css" rel="stylesheet" />
    <link href="calendar/packages/list/main.css" rel="stylesheet" />
    <script src="calendar/packages/core/main.js"></script>
    <script src="calendar/packages/core/locales-all.js"></script>
    <script src="calendar/packages/interaction/main.js"></script>
    <script src="calendar/packages/daygrid/main.js"></script>
    <script src="calendar/packages/timegrid/main.js"></script>
    <script src="calendar/packages/list/main.js"></script>

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
                        var memo = prompt('メモ:');

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
                                allDay: false, // タイムスロットを使用する場合はfalse
                                extendedProps: {
                                    memo: memo // メモを追加
                                }
                            });
                        }
                    }
                    calendar.unselect();
                },
                // イベントをクリックしたときのコード
                eventClick: function (info) {
                    var eventDetail = 'タイトル: ' + info.event.title + '\n'
                        + '開始: ' + info.event.start.toLocaleString() + '\n'
                        + '終了: ' + info.event.end.toLocaleString() + '\n'
                        + 'メモ: ' + (info.event.extendedProps.memo || 'なし');

                    if (window.confirm(eventDetail + '\n\nこのイベントを削除しますか？(OKをクリックしてください)')) {
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
    <img src="..\image\logo4.png" alt="ロゴ画像" id="logo" />
    <div id='calendar'></div>
</body>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
}

#top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
}

#calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
    text-align: center;
}

#logo {
    display: block;
    margin: 0 auto;
    width: 20%;
    height: auto;
}
</style>
</html>