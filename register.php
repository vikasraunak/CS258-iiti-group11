CREATE TABLE IF NOT EXISTS `alumni` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT "",
  `password` varchar(30) NOT NULL DEFAULT "",
  `name` varchar(40) NOT NULL DEFAULT "",
  `curr_loc` varchar(100) NOT NULL DEFAULT "",
  `perm_loc` varchar(100) NOT NULL DEFAULT "",
  `phone` varchar(20) NOT NULL DEFAULT "",
  `picture` varchar(100) NOT NULL DEFAULT "",
  `gender` varchar(10) NOT NULL DEFAULT "",
  `email` varchar(40) NOT NULL DEFAULT "",
  `batch` varchar(10) NOT NULL DEFAULT "",
  `branch` varchar(25) NOT NULL DEFAULT "",
  `job` varchar(100) NOT NULL DEFAULT "",
  `active` tinyint(5) NOT NULL DEFAULT 0,
  `type` varchar(64) NOT NULL DEFAULT "",
  `imgbool` tinyint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`mem_id`),
  UNIQUE(`mem_id`),
  UNIQUE(`username`),
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;



For events table: (Create manually)

$table = calendar_events
id  - INT  -  primary  -  autoincrement
event_ title   -  VARCHAR(30)
event_venue   - VARCHAR(100)
event_shortdesc  - VARCHAR(300)
event_start  -  DATETIME
event_invite_batch - INT(5)
event_invite_dept - VARCHAR(30)

/*for image, add another column manuallly.  name=img , type=blob ,  NULL ,(leave rest unchanged)*/
/*add a separate db for admin, add a table for pwd_reset, public posts */
