const SERVER_ENDPOINT = 'http://localhost:8000'

$.ajax({
    url: SERVER_ENDPOINT + '/notifications',
    method: "GET",
    success: function (data) {
        $('#notification-number').text(data.length)
        $('#notification-number2').text(data.length)
        $('#ul-list-notification')
            .html('<li>Notifications <span class="badge badge-pill badge-primary pull-right" id="notification-number">' + data.length + '</span></li>' + buildNotificationText(data)
            )

    },
});

$.ajax({
    url: SERVER_ENDPOINT + '/messages',
    method: "GET",
    success: function (data) {
        $('#ul-list-message').html(buildMessageText(data))
    },
})

function buildNotificationText(datas) {
    var returnData = ''
    datas.forEach(data => {
        returnData += '<li><div class="media"><div class="media-body"><h6 class="mt-0"><span><i class="fa fa-circle font-primary" ></i></span> ' + data.date + '</h6><p class="mb-0">' + data.content + '</p></div></div></li>';
    });
    return returnData;
}

function buildMessageText(datas) {
    var returnData = ''
    datas.forEach(data => {
        returnData += '<li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/clients/' + data.sender.photo + '" alt=""><div class="status-circle ' + getStatus(data.isRead) + '"></div><div class="about"><div class="name">' + data.sender.lastname + ' ' + data.sender.firstname + '</div><div class="status"> ' + data.content + '</div></div></li>'
    });
    return returnData;
}


function getStatus(isRead) {
    if (isRead == 1) {
        return 'away'
    } else {
        return 'offline'
    }
}