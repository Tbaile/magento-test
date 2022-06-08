define([
    'luxon'
], function (luxon) {
    const WEEKDAY_ENDS = 5;
    const HOUR_ENDS = 18;

    return function (data) {
        setData()
        setInterval(function () {
            setData()
        }, 30000)

        function setData() {
            let timer = luxon.DateTime.fromObject({hour: HOUR_ENDS}).startOf('hour')

            if (timer.diffNow() < 0) {
                if (luxon.DateTime.now().weekday > WEEKDAY_ENDS) {
                    timer = luxon.DateTime.fromObject({hour: HOUR_ENDS}).plus({ week: 1 }).startOf('week')
                } else {
                    timer = luxon.DateTime.fromObject({hour: HOUR_ENDS}).plus({ days: 1 }).startOf('hour')
                }
            }

            let diff = timer.diffNow(['hours', 'minutes'])
            document.getElementById('express-shipment-label').innerText = data.message
                .replace("%hours%", diff.hours)
                .replace("%minutes%", Math.floor(diff.minutes))
        }
    }
})
