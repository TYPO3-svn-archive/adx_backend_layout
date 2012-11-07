
#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	backend_layout varchar(64) NOT NULL DEFAULT '',
	backend_layout_next_level varchar(64) NOT NULL DEFAULT '',
);


#
# Table structure for table 'backend_layout'
#
CREATE TABLE backend_layout (
	tx_adxbackendlayout_layout_id varchar(32) NOT NULL DEFAULT '',
);


#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_adxbackendlayout_inherit tinyint(4) DEFAULT '0' NOT NULL,
	tx_adxbackendlayout_device_visibility varchar(32) NOT NULL DEFAULT '',
);