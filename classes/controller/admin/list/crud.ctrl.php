<?php
namespace Sdrdis\SpeedLearner;

class Controller_Admin_List_Crud extends \Nos\Controller_Admin_Crud
{
    public function action_test($id = null)
    {
        $list = Model_List::find($id);
        return render('sdrdis_speed_learner::admin/list/test', array('list' => $list));
    }
}
