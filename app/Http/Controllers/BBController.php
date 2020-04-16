<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Config;

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;

class BBController extends Controller
{
   
    public function __construct()
    {
         
    }
     
    public function index11()
    {
    	
    	$bbb = new BigBlueButton();
    	//dd($bbb);
    	$apiVersion = $bbb->getApiVersion();
        $this->assertEquals('SUCCESS', $apiVersion->getReturnCode());
        $this->assertEquals('2.0', $apiVersion->getVersion());
		$this->assertTrue($apiVersion->success());

    	dd('-------');
		$createMeetingParams = new CreateMeetingParameters('bbb-meeting-uid-65', 'BigBlueButton API Meeting');
		$createMeetingParams->setAttendeePassword('attendee_password');
		$createMeetingParams->setModeratorPassword('moderator_password');
		
			$createMeetingParams->setRecord(true);
			$createMeetingParams->setAllowStartStopRecording(true);
			$createMeetingParams->setAutoStartRecording(true);
		

		$response = $bbb->createMeeting($createMeetingParams);
		if ($response->getReturnCode() == 'FAILED') {
			return 'Can\'t create room! please contact our administrator.';
		} else {
			// process after room created
		}
		dd('asda');
    	$testApiVersion = new testApiVersion();
    	dd("testApiVersion",$testApiVersion);
		$bbb                 = new BigBlueButton();
		$createMeetingParams = new CreateMeetingParameters('bbb-meeting-uid-65', 'BigBlueButton API Meeting');
		$response            = $bbb->createMeeting($createMeetingParams);

		echo "Created Meeting with ID: " . $response->getMeetingId();

    } 


    public function index()
    {




$bbb = new BigBlueButton();


$createMeetingParams = new CreateMeetingParameters('bbb-meeting-uid-70', 'BigBlueButton API Meeting');
$createMeetingParams->setAttendeePassword('RETDSS');
$createMeetingParams->setModeratorPassword('FRDERE');

//dd($createMeetingParams);

$response = $bbb->createMeeting($createMeetingParams);
if ($response->getReturnCode() == 'FAILED') {
    return 'Can\'t create room! please contact our administrator.';
} else {
    // process after room created
}
echo "Created Meeting with ID: " . $response->getMeetingId();

$joinMeetingParams = new JoinMeetingParameters($response->getMeetingId(), 'ramesh', 'FRDERE'); // $moderator_password for moderator
$joinMeetingParams->setRedirect(true);
echo $url = $bbb->getJoinMeetingURL($joinMeetingParams);

echo "<br/>----------<br/>";
$joinMeetingParamsAttend = new JoinMeetingParameters($response->getMeetingId(), 'suresh', 'RETDSS'); // $moderator_password for moderator
$joinMeetingParamsAttend->setRedirect(true);
echo $urlAtt = $bbb->getJoinMeetingURL($joinMeetingParamsAttend);

//header('Location:' . $url);

dd('sssss');
//////////---------

$bbb = new BigBlueButton();
$response = $bbb->getMeetings();
dd($response);
if ($response->getReturnCode() == 'SUCCESS') {
    foreach ($response->getRawXml()->meetings->meeting as $meeting) {
        // process all meeting
    }
}

dd('sssss');
//////////---------
$bbb = new BigBlueButton();
//dd($bbb->getApiVersion());
$createMeetingParams = new CreateMeetingParameters('bbb-meeting-uid-65', 'BigBlueButton API Meeting');
//$createMeetingParams->setAttendeePassword('attendee_password');
//$createMeetingParams->setModeratorPassword('moderator_password');

//dd($createMeetingParams);

$response = $bbb->createMeeting($createMeetingParams);
if ($response->getReturnCode() == 'FAILED') {
    return 'Can\'t create room! please contact our administrator.';
} else {
    // process after room created
}
echo "Created Meeting with ID: " . $response->getMeetingId();

    }

}