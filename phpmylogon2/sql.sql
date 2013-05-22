CREATE TABLE `phpmylogon` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cookie_pass` varchar(32) NOT NULL,
  `actcode` varchar(32) NOT NULL,
  `rank` varchar(3) NOT NULL,
  `lastactive` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;