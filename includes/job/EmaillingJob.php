<?php
/**
 * Old job for notification emails.
 *
 * @file
 * @ingroup JobQueue
 */

/**
 * Old job used for sending single notification emails;
 * kept for backwards-compatibility
 *
 * @ingroup JobQueue
 */
class EmaillingJob extends Job {
	function __construct( $title, $params, $id = 0 ) {
		parent::__construct( 'sendMail', Title::newMainPage(), $params, $id );
	}

	function run() {
		UserMailer::send(
			$this->params['to'],
			$this->params['from'],
			$this->params['subj'],
			$this->params['body'],
			$this->params['replyto']
		);
		return true;
	}

}
