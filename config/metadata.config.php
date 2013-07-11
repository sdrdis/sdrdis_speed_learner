<?php
return array(
    'name'    => 'Speed Learner',
    'version' => 'WIP', //@todo: to be defined
    'provider' => array(
        'name' => 'Unknown', //@todo: to be defined
    ),
    'namespace' => "Sdrdis\SpeedLearner",
    'permission' => array(
    ),
    'icons' => array( //@todo: to be defined
        64 => 'static/apps/sdrdis_speed_learner/img/64/icon.png',
        32 => 'static/apps/sdrdis_speed_learner/img/32/icon.png',
        16 => 'static/apps/sdrdis_speed_learner/img/16/icon.png',
    ),
    'launchers' => array(
        'Sdrdis\SpeedLearner::List' => array(
            'name'    => 'List', // displayed name of the launcher
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/sdrdis_speed_learner/list/appdesk', // url to load
                ),
            ),
        ),
    ),
    /* Launcher configuration sample
    'launchers' => array(
        'key' => array( // key must be defined
            'name'    => 'name of the launcher', // displayed name of the launcher
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'url to load', // URL to load
                ),
            ),
        ),
    ),
    */
    // Enhancer configuration sample
    'enhancers' => array(
        /*
        'sdrdis_speed_learner_list' => array( // key must be defined
            'title' => 'Speed Learner List',
            'desc'  => '',
            'urlEnhancer' => 'sdrdis_speed_learner/front/list/main', // URL of the enhancer
            //'previewUrl' => 'admin/sdrdis_speed_learner/application/preview', // URL of preview
            //'dialog' => array(
            //    'contentUrl' => 'admin/sdrdis_speed_learner/application/popup',
            //    'width' => 450,
            //    'height' => 400,
            //    'ajax' => true,
            //),
        ),
        */
        /*
        'sdrdis_speed_learner_pair' => array( // key must be defined
            'title' => 'Speed Learner Pair',
            'desc'  => '',
            'urlEnhancer' => 'sdrdis_speed_learner/front/pair/main', // URL of the enhancer
            //'previewUrl' => 'admin/sdrdis_speed_learner/application/preview', // URL of preview
            //'dialog' => array(
            //    'contentUrl' => 'admin/sdrdis_speed_learner/application/popup',
            //    'width' => 450,
            //    'height' => 400,
            //    'ajax' => true,
            //),
        ),
        */
    ),
    /* Data catcher configuration sample
    'data_catchers' => array(
        'key' => array( // key must be defined
            'title' => 'title',
            'description'  => '',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/sdrdis_speed_learner/post/insert_update/?context={{context}}&title={{urlencode:'.\Nos\DataCatcher::TYPE_TITLE.'}}&summary={{urlencode:'.\Nos\DataCatcher::TYPE_TEXT.'}}&thumbnail={{urlencode:'.\Nos\DataCatcher::TYPE_IMAGE.'}}',
                    'label' => 'label of the data catcher',
                ),
            ),
            'onDemand' => true,
            'specified_models' => false,
            // data examples
            'required_data' => array(
                \Nos\DataCatcher::TYPE_TITLE,
            ),
            'optional_data' => array(
                \Nos\DataCatcher::TYPE_TEXT,
                \Nos\DataCatcher::TYPE_IMAGE,
            ),
        ),
    ),
    */
);
