<?php
return array(
    'controller_url'  => 'admin/sdrdis_speed_learner/list/crud',
    'model' => 'Sdrdis\SpeedLearner\Model_List',
    'layout' => array(
        'large' => true,
        'save' => 'save',
        'title' => 'list_title',
        'medias' => array('medias->csv_file->medil_media_id'),
        'content' => array(
            'content' => array(
                'view' => 'nos::form/expander',
                'params' => array(
                    'title'   => __('Content'),
                    'nomargin' => true,
                    'options' => array(
                        'allowExpand' => false,
                    ),
                    'content' => array(
                        'view' => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'fields' => array(
        'list__id' => array (
            'label' => 'ID: ',
            'form' => array(
                'type' => 'hidden',
            ),
            'dont_save' => true,
        ),
        'list_title' => array(
            'label' => __('Title'),
            'form' => array(
                'type' => 'text',
            ),
        ),
        'medias->csv_file->medil_media_id' => array(
            'label' => '',
            'renderer' => 'Nos\Media\Renderer_Media',
            'form' => array(
                'title' => __('CSV File'),
            ),
            'renderer_options' => array(
                'mode' => 'all',
                'inputFileThumb' => array(
                    'title' => __('CSV file from the Media Centre'),
                    'texts' => array(
                        'add'            => __('Pick an CSV file'),
                        'edit'           => __('Pick another CSV file'),
                        'delete'         => __('No CSV file'),
                        'wrongExtension' => __('This extension is not allowed.'),
                    ),
                ),
            )
        ),
        'list_number_of_words' => array(
            'label' => __('Number of words'),
            'form' => array(
                'type' => 'text',
            ),
            'before_save' => function($item) {
                $csv = new \Sdrdis\SpeedLearner\parseCSV();
                $csv->auto(NOSROOT.'local/'.$item->medias->csv_file->get_private_path());
                $item->list_number_of_words = count($csv->data);
            }
        ),
        'save' => array(
            'label' => '',
            'form' => array(
                'type' => 'submit',
                'tag' => 'button',
                // Note to translator: This is a submit button
                'value' => __('Save'),
                'class' => 'primary',
                'data-icon' => 'check',
            ),
        ),
    )
    /* UI texts sample
    'messages' => array(
        'successfully added' => __('Item successfully added.'),
        'successfully saved' => __('Item successfully saved.'),
        'successfully deleted' => __('Item has successfully been deleted!'),
        'you are about to delete, confim' => __('You are about to delete item <span style="font-weight: bold;">":title"</span>. Are you sure you want to continue?'),
        'you are about to delete' => __('You are about to delete item <span style="font-weight: bold;">":title"</span>.'),
        'exists in multiple context' => __('This item exists in <strong>{count} contexts</strong>.'),
        'delete in the following contexts' => __('Delete this item in the following contexts:'),
        'item deleted' => __('This item has been deleted.'),
        'not found' => __('Item not found'),
        'error added in context' => __('This item cannot be added {context}.'),
        'item inexistent in context yet' => __('This item has not been added in {context} yet.'),
        'add an item in context' => __('Add a new item in {context}'),
        'delete an item' => __('Delete a item'),
    ),
    */
    /*
    Tab configuration sample
    'tab' => array(
        'iconUrl' => 'static/apps/{{application_name}}/img/16/icon.png',
        'labels' => array(
            'insert' => __('Add a item'),
            'blankSlate' => __('Translate a item'),
        ),
    ),
    */
);