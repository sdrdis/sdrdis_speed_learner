<?php
$csv = new \Sdrdis\SpeedLearner\parseCSV();
$csv->auto(NOSROOT.'local/'.$list->medias->csv_file->get_private_path());
$speed_learner_config = array(
    'titles' => $csv->titles,
    'data' => $csv->data
);
?>
<div class="speed_learner" id="<?= $speed_learner_id = uniqid('speed_learner_') ?>"></div>
<script type="text/javascript">
    require([
        'jquery-nos',
        'static/apps/sdrdis_speed_learner/js/jquery.speedlearner.js',
        'link!static/apps/sdrdis_speed_learner/css/speedlearner.css'
    ], function($) {
        var speed_learner_config = <?= json_encode($speed_learner_config) ?>;
        var speed_learner_id = <?= json_encode($speed_learner_id) ?>;
        $('#' + speed_learner_id).speedlearner(speed_learner_config);
    });
</script>