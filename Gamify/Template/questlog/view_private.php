<section id="main">
<?= $this->projectHeader->render($project, 'QuestlogViewController&plugin=Questlog', 'show', false) ?> 
<!--<img src="http://www.nirn.de/files/6353/2031-Cs1J9y/ScreenShot11.jpg" style="width:1320px;height:580px;">-->
<?= $this->render('board/table_container', array(
        'project' => $project,
        'swimlanes' => $swimlanes,
        'board_private_refresh_interval' => $board_private_refresh_interval,
        'board_highlight_period' => $board_highlight_period,
    )) ?>
<style>
tr td {
padding: 10px 5px;
border: 1px solid black;
display: block;
}
th {
display: none;
}
table {
width: 30%;
}
.questlog-column-bg {
display: initial !important;
text-align: center !important;
z-index: -1 !important;
}

.task-board-icons, .dropdown, .popover {
display: none !important;
}
</style>
<script>
function leftArrowPressed() {
alert(1);
   // Your stuff here
}

function rightArrowPressed() {
alert(2);
   // Your stuff here
}

$(document).keydown = function(evt) {
    //evt = evt || window.event;
    switch (evt.keyCode) {
        case 37:
            leftArrowPressed();
            break;
        case 39:
            rightArrowPressed();
            break;
    }
};
</script>
</section>
