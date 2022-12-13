$(function(){
    function line_animate(id_name, st_x1, st_y1, st_x2, st_y2, ed_x1, ed_y1, ed_x2, ed_y2){
        Snap(id_name).line(st_x1,st_y1,st_x2,st_y2).attr({
            fill: 'none',
            stroke: "#000",
            strokeWidth: 1,
            strokeDasharray: "5,5"
        }).animate({x1: ed_x1, y1: ed_y1, x2: ed_x2, y2:ed_y2}, 2000);
    }
    function circle_animate(id_name, endpoint, canvas) {

        var canvasSize = canvas,
            centre = canvasSize/2,
            radius = canvasSize*0.8/2,
            s = Snap(id_name),
            path = "",
            arc = s.path(path),
            startY = centre-radius;

        Snap.animate(0, endpoint, function (val) {
            arc.remove();

            var d = val,
                dr = d-90;
            radians = Math.PI*(dr)/180,
                endx = centre + radius*Math.cos(radians),
                endy = centre + radius * Math.sin(radians),
                largeArc = d>180 ? 1 : 0;
            path = "M"+centre+","+startY+" A"+radius+","+radius+" 0 "+largeArc+",1 "+endx+","+endy;

            arc = s.path(path);
            arc.attr({
                stroke: '#000',
                fill: 'none',
                strokeWidth: 1,
                strokeDasharray: "5,5"
            });

        }, 2000);
    }


    circle_animate('#stitch_01', 180, 260);

    $(window).scroll(function(){
        if($(window).scrollTop() > 200) {
            line_animate('#stitch_08',0,0,0,0,0,0,570,570);
        }
        if($(window).scrollTop() > 500) {
            circle_animate('#stitch_02', 359, 210);
        }
        if($(window).scrollTop() > 900) {
            line_animate('#stitch_03',480,0,480,0,480,0,0,480);
        }
        if($(window).scrollTop() > 1500) {
            line_animate('#stitch_04',0,0,0,0,0,0,330,330);
        }
        if($(window).scrollTop() > 1600) {
            circle_animate('#stitch_05', 180, 250);
        }
        if($(window).scrollTop() > 2000) {
            line_animate('#stitch_06',0,0,0,0,0,0,0,440);
        }
        if($(window).scrollTop() > 2800) {
            circle_animate('#stitch_07', 270, 190);
        }
    });
});