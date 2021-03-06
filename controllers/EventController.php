<?php
/**
 * EventController.php
 *
 * tous ce que propose le PH en terme de gestion d'evennement
 *
 * @author: Tibor Katelbach <tibor@pixelhumain.com>
 * Date: 15/08/13
 */
class EventController extends CommunecterController {
    const moduleTitle = "Évènement";
    
  protected function beforeAction($action) {
    parent::initPage();
    return parent::beforeAction($action);
  }
  public function actions()
  {
      return array(
          'saveattendees'          		=> 'citizenToolKit.controllers.event.SaveAttendees',
          'dashboard' 					=> 'citizenToolKit.controllers.event.DashboardAction',
          'save'          				=> 'citizenToolKit.controllers.event.SaveAction',
          'getcalendar'   				=> 'citizenToolKit.controllers.event.GetCalendarAction',
          'delete' 						=> 'citizenToolKit.controllers.event.DeleteAction',
          'updatefield' 				=> 'citizenToolKit.controllers.event.UpdateFieldAction',
          'eventsv' 					=> 'citizenToolKit.controllers.event.EventSVAction',
          'calendarview'				=> 'citizenToolKit.controllers.event.CalendarViewAction',
          'saveattendee'				=> 'citizenToolKit.controllers.link.SaveAttendeeAction',
          'removeattendee'			 	=> 'citizenToolKit.controllers.link.RemoveAttendeeAction',
          'directory'             => 'citizenToolKit.controllers.event.DirectoryAction',
      );
  }
}