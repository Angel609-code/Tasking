!function(v) {
    "use strict";
    function e() {}
    e.prototype.init = async function() {
        var a = v("#event-modal")
          , t = v("#modal-title")
          , n = v("#form-event")
          , l = null
          , i = null
          , r = document.getElementsByClassName("needs-validation")
          , l = null
          , i = null
          , e = new Date
          , s = e.getDate()
          , d = e.getMonth()
          , e = e.getFullYear()
          , currentData = null;
        new FullCalendarInteraction.Draggable(document.getElementById("external-events"),{
            itemSelector: ".external-event",
            eventData: function(e) {
                return {
                    title: e.innerText,
                    className: v(e).data("class")
                }
            }
        });

        var form = new FormData();
        var settings = {
            "url": "https://angel609.es/testproyects/Data/events.php?useremail=" + localStorage.getItem("useremail"),
            "method": "GET",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": form
        };

        let x = await $.ajax(settings).done(function (response) {
            return response.substring(1, response.length -1);
        });
        let y = [];
        x = JSON.parse(x);
        
        x.forEach(element => {
            y.push({
                title: element.title, 
                start: new Date(element.start),
                end: new Date(element.end),
                allDay: element.allDay == "1" ? true : false, 
                className: element.className,
                id: element.id
            });
        });

        e = y;
        // e = [{
        //     title: "All Day Event",
        //     start: new Date(e,d,1)
        // }, {
        //     title: "Long Event",
        //     start: new Date(e,d,s - 5),
        //     end: new Date(e,d,s - 2),
        //     className: "bg-warning"
        // }, {
        //     id: 999,
        //     title: "Repeating Event",
        //     start: new Date(e,d,s - 3,16,0),
        //     allDay: !1,
        //     className: "bg-info"
        // }, {
        //     id: 999,
        //     title: "Repeating Event",
        //     start: new Date(e,d,s + 4,16,0),
        //     allDay: !1,
        //     className: "bg-primary"
        // }, {
        //     title: "Meeting",
        //     start: new Date(e,d,s,10,30),
        //     allDay: !1,
        //     className: "bg-success"
        // }, {
        //     title: "Lunch",
        //     start: new Date(e,d,s,12,0),
        //     end: new Date(e,d,s,14,0),
        //     allDay: !1,
        //     className: "bg-danger"
        // }, {
        //     title: "Birthday Party",
        //     start: new Date(e,d,s + 1,19,0),
        //     end: new Date(e,d,s + 1,22,30),
        //     allDay: !1,
        //     className: "bg-success"
        // }, {
        //     title: "Click for Google",
        //     start: new Date(e,d,28),
        //     end: new Date(e,d,29),
        //     url: "http://google.com/",
        //     className: "bg-dark"
        // }];

        document.getElementById("external-events"),
        d = document.getElementById("calendar");
        function o(e) {
            a.modal("show"),
            n.removeClass("was-validated"),
            n[0].reset(),
            v("#event-title").val(),
            v("#event-category").val(),
            t.text("Add Event"),
            i = e,
            currentData = i,
            l = e;
        }
        var c = new FullCalendar.Calendar(d,{
            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid", "resource"],
            editable: !0,
            droppable: !0,
            selectable: !0,
            defaultView: "dayGridMonth",
            themeSystem: "bootstrap",
            header: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
            },
            eventReceive: function(i){

            },
            drop: function(e){

            },
            eventClick: function(e) {
                a.modal("show"),
                n[0].reset(),
                l = e.event,
                v("#event-title").val(l.title),
                v("#event-category").val(l.classNames[0]),
                i = null,
                t.text("Edit Event"),
                i = null,
                currentData = e;
            },
            dateClick: function(e) {
                o(e)
            },
            select: function(e) {
                o(e)
            },
            events: e
        });
        c.render(),
        v(n).on("submit", function(e) {
            e.preventDefault();
            v("#form-event :input");
            var t = v("#event-title").val()
              , e = v("#event-category").val();

            if(!1 === r[0].checkValidity()){
                event.preventDefault();
                event.stopPropagation();
                r[0].classList.add("was-validated");
                return;
            }else{
                let startD = null, allD = null, endD = null;
                console.log(currentData);
                if(currentData.date != undefined){
                    startD = currentData.date;
                    endD = "";
                    allD = currentData.allDay;
                    let id = {id: ""};
                    currentData.event = id;

                }else if(currentData.start != undefined){
                    startD = currentData.start;
                    endD = currentData.end;
                    allD = currentData.allDay;

                    let id = {id: ""};
                    currentData.event = id;
                }else{
                    startD = currentData.event.start;
                    endD = currentData.event.end;
                    allD = currentData.event.allDay;
                    
                    l.remove();
                };
                var response;

                if(currentData.event.id != ""){
                    let ad = allD ? 1 : 0;
                    let url_ = "https://angel609.es/testproyects/Data/events.php?id=" + currentData.event.id + 
                                "&useremail="+ localStorage.getItem("useremail")+ "&title=" +
                                t + "&start=" + startD + "&end=" + endD +"&allDay=" + ad + "&className=" + e;
                    
                    var settings = {
                        "url": url_,
                        "method": "PUT",
                        "timeout": 0,
                    };
                    
                    $.ajax(settings).done(function (response) {
                        
                        let item = {
                            title: t,
                            start: startD,
                            end: endD,
                            allDay: allD ? 1 : 0,
                            className: e,
                            id: response ? response : 0
                        };
        
                        c.addEvent(item),
                        a.modal("hide");
                    });
                }else{
                    var form = new FormData();
                    form.append("useremail", localStorage.getItem("useremail"));
                    form.append("title", t);
                    form.append("start", startD);
                    form.append("end", endD);
                    form.append("allDay", allD ? 1 : 0);
                    form.append("className", e);
        
                    var settings = {
                        "url": "https://angel609.es/testproyects/Data/events.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form
                    };
        
                    $.ajax(settings).done(function (response) {
                        let item = {
                            title: t,
                            start: startD,
                            end: endD,
                            allDay: allD ? 1 : 0,
                            className: e,
                            id: response
                        };
        
                        c.addEvent(item),
                        a.modal("hide");
                    });
                }
            }
        }),
        v("#btn-delete-event").on("click", function(e) {
            if(currentData.date != undefined){

            }else{
                if(currentData.event.id != ""){
                    var settings = {
                        "url": "https://angel609.es/testproyects/Data/events.php?id=" + currentData.event.id,
                        "method": "DELETE",
                        "timeout": 0,
                    };
                      
                    $.ajax(settings).done(function (response) {
                        console.log(response);
                    });
                }
                l.remove();
            };
            a.modal("hide");
        }),
        v("#btn-new-event").on("click", function(e) {
            o({
                date: new Date,
                allDay: !0
            })
        })
    }
    
    v.CalendarPage = new e;
    v.CalendarPage.Constructor = e;
}(window.jQuery),
function() {
    "use strict";
    window.jQuery.CalendarPage.init()
}();
