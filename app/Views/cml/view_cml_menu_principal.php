<?php
$reports = [
    'main' => 'https://app.powerbi.com/view?r=eyJrIjoiMGE1MWM4NGItMTUwZC00ZWM5LWFjMDktMDM2YTU5YWRmNmE5IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9&pageName=ReportSection474109c64531e7105498',
    '1' => 'https://app.powerbi.com/view?r=eyJrIjoiMGE1MWM4NGItMTUwZC00ZWM5LWFjMDktMDM2YTU5YWRmNmE5IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9&pageName=ReportSectionf167fa364726cb94e60c',
    '2' => 'https://app.powerbi.com/view?r=eyJrIjoiMGE1MWM4NGItMTUwZC00ZWM5LWFjMDktMDM2YTU5YWRmNmE5IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9&pageName=ReportSection688d70b6b9f4ae54bc6b',
    '3' => 'https://app.powerbi.com/view?r=eyJrIjoiMGE1MWM4NGItMTUwZC00ZWM5LWFjMDktMDM2YTU5YWRmNmE5IiwidCI6IjRiZjM4ZWEyLTgzMmQtNDU1Mi1iNTA4LTQyMTU3MGRhNDNmZiIsImMiOjR9&pageName=ReportSection53285c47f9277564f3c2'

];
?>
<!-- <h1 class="mt-4">Informe</h1> -->
<div class="container mt-n10">
    <!-- Button only in Mobile: redirect to see report in fullscreen-->
    <div class="d-block d-sm-none">
        <a href="<?= $reports[$num_report] ?>" class="btn btn-white btn-block mb-3">Ver reporte en pantalla completa</a>
    </div>
    <!-- End of Button only in Mobile -->
    <div class="card card-header-actions mx-auto">
        <div class="card-body">
            <div class="form-row">
                <!-- <iframe width="100%" height="3000" src="" frameborder="0" style="border:0" allowfullscreen scrolling="no"></iframe> -->
                <iframe title="Report Section" width="100%" height="800" src="<?= $reports[$num_report] ?>" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>
</div>