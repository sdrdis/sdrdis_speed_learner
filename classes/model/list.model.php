<?php

namespace Sdrdis\SpeedLearner;

class Model_List extends \Nos\Orm\Model
{

    protected static $_primary_key = array('list_id');
    protected static $_table_name = 'sdrdis_sl_lists';

    protected static $_properties = array(
        'list_id',
        'list_title',
        'list_number_of_words',
        'list_created_at',
        'list_updated_at',
    );

    protected static $_title_property = 'list_title';

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
            'property'=>'list_created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
            'property'=>'list_updated_at'
        )
    );

    protected static $_behaviours = array(
        /*
        'Nos\Orm_Behaviour_Publishable' => array(
            'publication_state_property' => 'list__publication_status',
            'publication_start_property' => 'list__publication_start',
            'publication_endproperty' => 'list__publication_end',
        ),
        */
        /*
        'Nos\Orm_Behaviour_Urlenhancer' => array(
            'enhancers' => array('sdrdis_speed_learner_list'),
        ),
        */
        /*
        'Nos\Orm_Behaviour_Virtualname' => array(
            'events' => array('before_save', 'after_save'),
            'virtual_name_property' => 'list_virtual_name',
        ),
        */
        /*
        'Nos\Orm_Behaviour_Twinnable' => array(
            'events' => array('before_insert', 'after_insert', 'before_save', 'after_delete', 'change_parent'),
            'context_property'      => 'list__context',
            'common_id_property' => 'list__context_common_id',
            'is_main_property' => 'list__context_is_main',
            'invariant_fields'   => array(),
        ),
        */
    );

    protected static $_belongs_to  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $list->key
            'key_from' => 'list_...', // Column on this model
            'model_to' => 'Sdrdis\SpeedLearner\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_has_many  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $list->key
            'key_from' => 'list_...', // Column on this model
            'model_to' => 'Sdrdis\SpeedLearner\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_many_many = array(
        /*
            'key' => array( // key must be defined, relation will be loaded via $list->key
                'table_through' => '...', // intermediary table must be defined
                'key_from' => 'list_...', // Column on this model
                'key_through_from' => '...', // Column "from" on the intermediary table
                'key_through_to' => '...', // Column "to" on the intermediary table
                'key_to' => '...', // Column on the other model
                'cascade_save' => false,
                'cascade_delete' => false,
                'model_to'       => 'Sdrdis\SpeedLearner\Model_...', // Model to be defined
            ),
        */
    );
}
