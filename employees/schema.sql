
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `e_pass` varchar(50) NOT NULL,
  `e_role` varchar(50) DEFAULT NULL,
  `e_payroll_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e_name` (`e_name`),
  KEY `e_payroll_no` (`e_payroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

