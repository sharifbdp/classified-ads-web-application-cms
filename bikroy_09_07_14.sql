-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2014 at 02:37 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bikroy`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertizement`
--

CREATE TABLE `advertizement` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cate_1` int(11) NOT NULL,
  `cate_2` int(11) NOT NULL,
  `cate_3` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ad_location` int(11) NOT NULL,
  `ad_city` int(11) NOT NULL,
  `for_what` varchar(1) NOT NULL COMMENT '1=For sale; 2=Wanted',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `negotiable` int(1) NOT NULL COMMENT '1=Negotiable',
  `entry_date` datetime NOT NULL,
  `type` int(1) NOT NULL COMMENT '1= private; 2= business',
  `status` int(2) NOT NULL COMMENT '1= active; 0= inactive; 5= Incomplete;13= delete',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `advertizement`
--

INSERT INTO `advertizement` (`id`, `cate_1`, `cate_2`, `cate_3`, `p_id`, `ad_location`, `ad_city`, `for_what`, `title`, `slug`, `details`, `price`, `negotiable`, `entry_date`, `type`, `status`) VALUES
(1, 2, 23, 25, 1, 1, 1, '1', 'A bikes', 'a-bikes', 'A bikes A bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikesA bikes', 890.00, 0, '2014-05-13 23:21:28', 1, 0),
(2, 1, 12, 0, 5, 1, 2, '1', 'Micromax x455', 'micromax-x455', 'Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455Micromax x455', 3000.00, 0, '2014-05-13 23:22:18', 2, 1),
(3, 2, 23, 26, 5, 2, 9, '1', 'Aspire 4749z', 'aspire-4749z', 'Aspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749zAspire 4749z', 9000.00, 0, '2014-05-13 23:24:01', 1, 0),
(4, 2, 23, 25, 6, 1, 3, '1', 'New Bmx bicycle from U.S', 'new-bmx-bicycle-from-us', 'it''s in perfect condition and jxt. arrived', 500.00, 0, '2014-05-15 23:13:32', 1, 0),
(5, 2, 23, 25, 7, 1, 5, '2', 'New Bicycle', 'new-bicycle', 'Home used BMX...Turning steer...no faults', 890.00, 0, '2014-05-15 23:15:20', 2, 1),
(6, 1, 12, 0, 8, 1, 2, '1', 'Mob One', 'mob-one', 'Mob OneMob OneMob OneMob OneMob One', 9089.00, 0, '2014-05-21 22:48:18', 1, 5),
(7, 1, 12, 0, 9, 1, 2, '1', 'Mob One', 'mob-one-1', 'Mob OneMob OneMob OneMob OneMob One', 9089.00, 0, '2014-05-21 22:52:11', 1, 5),
(8, 1, 12, 0, 10, 1, 2, '1', 'Mob One', 'mob-one-3', 'Mob OneMob OneMob OneMob OneMob One', 9089.00, 0, '2014-05-28 00:46:24', 1, 0),
(9, 1, 12, 0, 11, 1, 5, '1', 'Symphony w65i only 3 month used', 'symphony-w65i-only-3-month-used', 'Symphony w65i only 3 month usedSymphony w65i only 3 month usedSymphony w65i only 3 month usedSymphony w65i only 3 month usedSymphony w65i only 3 month usedSymphony w65i only 3 month used', 300.00, 0, '2014-05-24 12:02:56', 1, 1),
(10, 1, 12, 0, 11, 1, 2, '1', 'Nokia X2-00', 'nokia-x2-00', 'Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00Nokia X2-00', 700.00, 0, '2014-05-27 00:29:58', 1, 1),
(11, 1, 12, 0, 10, 1, 4, '1', 'Micromax x4789', 'micromax-x4789-1', 'Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x4Micromax x47', 507.00, 0, '2014-05-27 01:29:09', 1, 5),
(12, 1, 13, 0, 10, 1, 7, '1', 'My test', 'my-test', 'ads will be rejected.\nDo not upload pictures with watermarks. Invalid pictures will be removed.\nDo not put your email or phone numbers in the title or description.ads will be rejected.\nDo not upload pictures with watermarks. Invalid pictures will be removed.\nDo not put your email or phone numbers in the title or description.', 1980.00, 0, '2014-06-22 20:46:21', 1, 0),
(13, 1, 12, 0, 15, 1, 3, '1', 'Nokia n8', 'nokia-n8-1', 'Nokia n8Nokia n8Nokia n8Nokia n8', 300.00, 0, '2014-07-09 02:02:17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertizement_image`
--

CREATE TABLE `advertizement_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `advertizement_image`
--

INSERT INTO `advertizement_image` (`id`, `ad_id`, `image_name`, `status`) VALUES
(1, 1, 'mobile.jpg', 1),
(2, 1, 'Acer-Aspire-A5560-7414.png', 1),
(3, 2, 'mobiole.jpg', 1),
(4, 3, 'watch.jpg', 1),
(5, 4, 'bike1.jpg', 1),
(6, 5, 'bike2.jpg', 1),
(7, 6, 'mobiole1.jpg', 0),
(8, 7, 'mobiole2.jpg', 0),
(14, 8, 'mobile3.jpg', 1),
(10, 9, 'mobile1.jpg', 1),
(11, 10, 'mobile2.jpg', 1),
(12, 11, 'images.jpeg', 0),
(15, 8, 'images1.jpeg', 1),
(16, 12, 'Costa_Rican_Frog.jpg', 1),
(17, 12, 'Boston_City_Flow.jpg', 1),
(18, 13, 'watch1.jpg', 1),
(19, 13, 'mobile4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `serial` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `links`, `image`, `serial`, `status`) VALUES
(1, 'Banner 1', '', 'banner.jpg', 5, 1),
(2, 'Banner 2', '', 'banner_1.jpg', 10, 1),
(3, 'Banner 3', '', 'banner_2.jpg', 15, 1),
(4, 'name', '', 'banner.jpg', 0, 1),
(5, 'sasasas', '', 'accessories-blur_thumb.jpg', 0, 1),
(6, 'sasasasasas', '', 'site_load_thumb.gif', 0, 1),
(7, 'dasjkdask;sj', 'banner_2_thumb.jpg', 'banner_1_thumb.jpg', 0, 1),
(8, 'saadadsadasd', 'glyphicons-halflings-white_thumb.png', 'glyphicons-halflings_thumb.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `summary` mediumtext NOT NULL,
  `serial` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `alias`, `summary`, `serial`, `status`) VALUES
(1, 0, 'Electronics', 'electronics', 'Find great deals for used electronics in Ghana including mobile phones, computers, laptops, TVs, home theatres and much more.', 5, 1),
(2, 0, 'Cars & Vehicles', 'cars-vehicles', 'Buy and sell used cars, motorbikes and other vehicles in Ghana. Choose from top brands including Toyota, Nissan, Honda and Suzuki.', 10, 1),
(3, 0, 'Property', 'property', 'View listings for property in Ghana. Find the cheapest rates for apartments, commercial and residential properties, as well as for land and plots.', 15, 1),
(4, 0, 'Personal Items', 'personal-items', 'Buy and sell clothing, garments, shoes and other personal items including handbags, perfumes, children''s toys and hand made items in Ghana.', 20, 1),
(5, 0, 'Home Appliances', 'home-appliances', 'Buy and sell new and used home appliances including furniture, kitchen items, garden products and other household items in Ghana.', 25, 1),
(6, 0, 'Jobs & Services', 'jobs-services', 'Post and apply for jobs and career opportunities in Ghana . Search for job vacancies in your city.', 30, 1),
(7, 0, 'Pets & Animals', 'pets-animals', 'Search from the widest variety of pets in Ghana . Select from dogs, puppies, cats, kittens, birds and other domesticated animals.', 35, 1),
(8, 0, 'Leisure, Sport & Hobby', 'leisure-sport-hobby', 'Buy and sell used musical instruments, sports gear and accessories, art and collectibles, movies, music and more.', 40, 1),
(9, 0, 'Education', 'education', 'Buy and sell books and magazines, find tuition, classes and other educational resources in Ghana.', 45, 1),
(10, 0, 'Other', 'other', 'Free classified ads for miscellaneous products and items all over Ghana. Buy and sell almost anything.', 50, 13),
(11, 0, 'Food & Agriculture', 'food-agriculture', 'Find food and edible products, including fresh fruits and vegetables, meats, fish, seafood, crop seeds, plants and other agricultural products in Ghana.', 55, 1),
(12, 1, 'Mobile Phones', 'mobile-phones', '', 5, 1),
(13, 1, 'Computers & Accessories', 'computers-accessories', '', 10, 1),
(14, 1, 'TV & Video', 'tv-video', '', 15, 1),
(15, 1, 'Audio & MP3', 'audio-mp3', '', 20, 1),
(16, 1, 'Video Games & Consoles', 'video-games-consoles', '', 25, 1),
(17, 1, 'Mobile Phone Accessories', 'mobile-phone-accessories', '', 30, 1),
(18, 1, 'Cameras & Camcorders', 'cameras-camcorders', '', 35, 1),
(19, 1, 'Other Electronics', 'other-electronics', '', 40, 1),
(20, 2, 'Cars', 'cars', '', 5, 1),
(21, 2, 'Parts & Accessories', 'parts-accessories', '', 10, 1),
(22, 2, 'Boats & Water Transport', 'boats-water-transport', '', 15, 1),
(23, 2, 'Bikes & Scooters', 'bikes-scooters', '', 20, 1),
(24, 2, 'Truck, Bus & Heavy-Duty', 'truck-bus-heavy-duty', '', 25, 1),
(25, 23, 'Bicycles', 'bicycles', '', 5, 1),
(26, 23, 'Motorbikes & Scooters', 'motorbikes-scooters', '', 10, 1),
(999, 0, 'Other', 'other', 'Free classified ads for miscellaneous products and items all over Ghana. Buy and sell almost anything.', 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_brand`
--

CREATE TABLE `category_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category_brand`
--

INSERT INTO `category_brand` (`id`, `cid`, `name`, `status`) VALUES
(1, 26, 'Bajaj', 1),
(2, 26, 'BMW', 1),
(3, 26, 'Chopper', 1),
(4, 26, 'Dafu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flink`
--

CREATE TABLE `flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `links` varchar(255) CHARACTER SET utf8 NOT NULL,
  `position` int(1) NOT NULL,
  `serial` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `flink`
--

INSERT INTO `flink` (`id`, `name`, `links`, `position`, `serial`, `status`) VALUES
(1, 'About Us', '#', 1, 5, 1),
(2, 'Delivery Information', '#', 1, 10, 1),
(3, 'Privacy Policy', '#', 1, 15, 0),
(4, 'Terms & Conditions', '#', 1, 20, 1),
(5, 'Contact Us', '#', 2, 5, 1),
(6, 'Returns', '#', 1, 10, 1),
(7, 'Sitemap', 'http://infobasehost.com/behula/view/sitemap/', 2, 15, 1),
(8, 'Brands', '#', 3, 5, 1),
(9, 'Gift Vouchers', '#', 3, 10, 1),
(10, 'Affiliates', '#', 3, 15, 1),
(11, 'Specials', '#', 3, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flink_position_name`
--

CREATE TABLE `flink_position_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flink_position_name`
--

INSERT INTO `flink_position_name` (`id`, `name`) VALUES
(1, 'Information'),
(2, 'Customer Service'),
(3, 'Extras');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `smid` int(11) NOT NULL,
  `head_line` tinytext NOT NULL,
  `summary` mediumtext NOT NULL,
  `details` longtext NOT NULL,
  `last_action_date` datetime NOT NULL,
  `last_action_user` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= inactive; 1=active; 13 = delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `mid`, `smid`, `head_line`, `summary`, `details`, `last_action_date`, `last_action_user`, `status`) VALUES
(1, 0, 0, 'Welcome to website.com', '<p>\n	The favorite shopping destination for online shoppers: An exclusive webstore for Indian dresses, we offer an eclectic collection of Indian ethnic clothing right from Sarees, Salwar Kameez, Lehengas, Indo-western wear to Footwear, Handbags, Jewelry, and Accessories to match. Uncover a range of Indian fashion outfits and bridal wear handpicked from all corners of the country, reflecting the vibrancy inherent in all things Indian!</p>\n', '<p>\n	The favorite shopping destination for online shoppers: An exclusive webstore for Indian dresses, we offer an eclectic collection of Indian ethnic clothing right from Sarees, Salwar Kameez, Lehengas, Indo-western wear to Footwear, Handbags, Jewelry, and Accessories to match. Uncover a range of Indian fashion outfits and bridal wear handpicked from all corners of the country, reflecting the vibrancy inherent in all things Indian!</p>\n<p>\n	The favorite shopping destination for online shoppers: An exclusive webstore for Indian dresses, we offer an eclectic collection of Indian ethnic clothing right from Sarees, Salwar Kameez, Lehengas, Indo-western wear to Footwear, Handbags, Jewelry, and Accessories to match. Uncover a range of Indian fashion outfits and bridal wear handpicked from all corners of the country, reflecting the vibrancy inherent in all things Indian!</p>\n', '2014-04-11 01:20:19', 1, 0),
(2, 0, 0, 'Our courtesy', '<p>\n	Our courtesy</p>\n', '', '2014-04-11 01:20:36', 1, 0),
(3, 0, 0, 'Festival Adz', '<p>\n	Festival Adz</p>\n', '', '2014-04-11 01:20:55', 1, 0),
(4, 0, 0, 'Notice One', '<p>\n	Season up everyday with spic-n-span gamut of Indian Ethnic Wear.</p>\n', '', '2014-04-11 01:21:13', 1, 0),
(5, 0, 0, 'Information', '<p>\n	"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>\n', '', '2014-04-11 01:21:34', 1, 0),
(6, 0, 0, 'Notice Three', '<p>\n	Season up everyday with spic-n-span gamut of Indian Ethnic Wear.<br />\n	<a href="http://192.168.1.121/behula/#">Check out today''s additions</a></p>\n', '', '2013-10-12 12:28:38', 1, 13),
(7, 0, 0, 'Notice Four', '<p>\n	Season up everyday with spic-n-span gamut of Indian Ethnic Wear.<br />\n	<a href="http://192.168.1.121/behula/#">Check out today''s additions</a></p>\n', '', '2013-10-12 12:28:24', 1, 13),
(8, 1, 0, 'Welcome to website.com''s Help and Support', '<p>\n	Here you can find answers to our most frequently asked questions, or learn more about how to make great deals. If you don''t find what you''re looking for, get in touch.</p>\n', '<h2>\n	How to sell fast?</h2>\n<div class="section">\n	<div class="photo">\n		<img alt="Sell fast" src="/editor_uploads/images/sellfast-1.jpg" style="width: 228px; height: 269px;" />\n		<h3 class="number">\n			1</h3>\n	</div>\n	<div class="text">\n		<h3>\n			Pick the right price - everything sells if the price is right.</h3>\n		<ul>\n			<li>\n				Browse similar ads and pick a competitive price.</li>\n			<li>\n				Consider how much buyers are willing to pay - the lower the price, the higher the demand.</li>\n		</ul>\n	</div>\n</div>\n<div class="section right">\n	<div class="photo">\n		<img alt="Sell fast" src="/editor_uploads/images/sellfast-2.jpg" style="width: 228px; height: 269px;" />\n		<h3 class="number">\n			2</h3>\n	</div>\n	<div class="text">\n		<h3>\n			Use good pictures - more people view ads with pictures.</h3>\n		<ul>\n			<li>\n				Use original photos - ads with photos of the actual item(s) sell faster.</li>\n			<li>\n				Take clear photos - use good lighting and different angles.</li>\n		</ul>\n	</div>\n</div>\n<div class="section">\n	<div class="photo">\n		<img alt=" - " src="/editor_uploads/images/sellfast-3.jpg" style="width: 24px; height: 24px;" />\n		<h3 class="number">\n			3</h3>\n	</div>\n	<div class="text">\n		<h3>\n			Provide a clear title and description - focus on information that is relevant to buyers.</h3>\n		<ul>\n			<li>\n				Imagine yourself as the buyer - what would you want to know if you were looking for this item?</li>\n			<li>\n				Keep the title short and simple - use key words that people might search for (e.g. item name, brand/company, model/type).</li>\n			<li>\n				Be honest in your description – describe any imperfections along with details of the item''s features.</li>\n		</ul>\n	</div>\n</div>\n<p>\n	&nbsp;</p>\n', '2014-04-11 01:56:05', 1, 1),
(9, 6, 0, 'Welcome to website.com''s Help and Support', '<p>\n	Here you can find answers to our most frequently asked questions, or learn more about how to make great deals. If you don''t find what you''re looking for, get in touch.</p>\n', '<h2>\n	FAQ</h2>\n<dl id="faq">\n	<dt id="q-1">\n		<i>1</i> <a href="#">How do I post an ad?</a></dt>\n	<dd>\n		<p>\n			Posting an ad on website.com is quick, easy and completely free! Simply click the yellow <a href="#">Post Ad</a> button in the upper right-hand corner and follow the instructions.</p>\n		<p>\n			If you are logged in to an account, your details will be filled in for you automatically.</p>\n		<p>\n			We will send you an email confirmation once we have reviewed your ad. This usually takes about 1 hour during office hours.</p>\n	</dd>\n	<dt id="q-2">\n		<i>2</i> <a href="#">How do I delete my ad?</a></dt>\n	<dd>\n		<p>\n			If you would like to delete your ad, go to the ad you would like to delete and click the "Edit/delete" link at the bottom of the ad. You will need the password for the ad. If you can''t find or remember your password, <a href="#q-4">click here</a> for help.</p>\n		<p>\n			If you are an account owner, you can either click the "Edit/delete" link at the bottom of the ad, or click the "Delete" link next to an ad on your "My ads" page.</p>\n	</dd>\n	<dt id="q-3">\n		<i>3</i> <a href="#">How do I edit my ad?</a></dt>\n	<dd>\n		<p>\n			If you would like to edit your ad, go to the ad you would like to edit and click the "Edit/delete" link at the bottom of the ad. You will need the password for the ad. If you can''t find or remember your password, <a href="#q-4">click here</a> for help.</p>\n		<p>\n			If you are an account owner, you can either click the "Edit/delete" link at the bottom of the ad, or click the "Edit" link next to an ad on your "My ads" page.</p>\n	</dd>\n	<dt id="q-4">\n		<i>4</i> <a href="#">How do I set a new password for my ad?</a></dt>\n	<dd>\n		<p>\n			If you would like to set a new password, go to your ad and click the "Edit/delete" link at the bottom of the ad. Click on the link that says "Lost your password?" and follow the instructions.</p>\n		<p>\n			If you are an account owner, your ads are posted with your account password. To change the account password, go to your account''s "Settings" page.</p>\n	</dd>\n	<dt id="q-5">\n		<i>5</i> <a href="#">How long do ads stay on website.com?</a></dt>\n	<dd>\n		<p>\n			Ads appear for 90 days, unless you manually delete them. If you need help deleting your ad, <a href="#q-2">click here</a>.</p>\n	</dd>\n	<dt id="q-6">\n		<i>6</i> <a href="#">I posted an ad but can''t find it. What’s wrong?</a></dt>\n	<dd>\n		<p>\n			All ads are reviewed against fraud and spam so it can take up to 1 hour before an ad is published on the site. If you still can''t find your ad after 1 hour, it may have violated our <a href="#q-12">posting rules</a>. If your ad was not approved, you should have received an email explaining the reasons.</p>\n		<p>\n			If you have been waiting longer than 24 hours for a response from us, you may have given us the wrong email address when you posted the ad. Try posting again or <a href="&lt;?php echo base_url();?&gt;en/details/contact-us">contact us</a>.</p>\n		<p>\n			If you are an account owner, your ads that are currently under review are listed on your "My ads" page, in the "My ads under review" section.</p>\n	</dd>\n	<dt id="q-7">\n		<i>7</i> <a href="#">Why has my ad been rejected?</a></dt>\n	<dd>\n		<p>\n			All of the ads are manually reviewed - if your ad violates our <a href="#q-11">posting rules</a> it will be rejected. You can read what changes you have to make before the ad can be approved in the rejection email.</p>\n	</dd>\n	<dt id="q-8">\n		<i>8</i> <a href="#">I''m getting contacted about an ad I didn''t post. Can you help me?</a></dt>\n	<dd>\n		<p>\n			Of course. Please <a href="&lt;?php echo base_url();?&gt;en/details/contact-us">contact us</a> and we will help you right away.</p>\n	</dd>\n	<dt id="q-9">\n		<i>9</i> <a href="#">I haven''t received any responses to my ad. What''s wrong?</a></dt>\n	<dd>\n		<p>\n			It is strongly recommended that you write a good title and detailed description, and use clear original images in your ad. Take a look at our tips on <a href="&lt;?php echo base_url();?&gt;en/details/how-to-sell-fast">how to sell fast</a>.</p>\n		<p>\n			<a href="#q-3">Click here</a> to get help on how to edit your ad.</p>\n	</dd>\n	<dt id="q-10">\n		<i>10</i> <a href="#">How does this site make money?</a></dt>\n	<dd>\n		<p>\n			The basic service of selling and buying will always be free on website.com. However, we are now starting to add advertising to the site, as well as paid features.</p>\n	</dd>\n	<dt id="q-11">\n		<i>11</i> <a href="#">What are the rules for posting on website.com?</a></dt>\n	<dd>\n		<p>\n			We don''t allow ads that contain:<br />\n			- an item or service that is illegal in Ghana<br />\n			- an item or service that is not located in Ghana<br />\n			- an invalid phone number or email<br />\n			- an unrealistic offer<br />\n			- offensive language<br />\n			- offensive pictures<br />\n			- text in the title or description that is not related to the advertised item or service<br />\n			- pictures that do not match or clearly show the advertised item or service<br />\n			- a non-specific item or service, e.g. a description of a company in general terms<br />\n			- a URL link that is not relevant to the advertised item or service<br />\n			- offers and requests for items or services in the same ad<br />\n			- the same content as another ad<br />\n			- “work from home" jobs</p>\n	</dd>\n	<dt id="q-12">\n		<i>12</i> <a href="#">How do I sign up for a user account on website.com?</a></dt>\n	<dd>\n		<p>\n			Signing up for an account on website.com is quick, easy and completely free! You can either go to the <a href="/users/sign_up">Sign up page</a> and fill out your details, or you can create an account automatically by <a href="/en/post_ad">posting an ad</a> and selecting the "Create an account" checkbox on the Preview page.</p>\n		<p>\n			Once you have signed up, a link will be sent to your email with instructions on how to activate your account.</p>\n	</dd>\n	<dt id="q-13">\n		<i>13</i> <a href="#">How do I log in and log out of my account?</a></dt>\n	<dd>\n		<p>\n			To log in to your account, simply go to the <a href="#">Log in page</a> and enter your email and account password.</p>\n		<p>\n			To log out of your account, simply click the "Log out" link in the green bar.</p>\n	</dd>\n	<dt id="q-14">\n		<i>14</i> <a href="#">How do I change my account details?</a></dt>\n	<dd>\n		<p>\n			To change your name, phone number or password, or to add an address or location (optional), go to your account''s "Settings" page. Please note that the email address for your account cannot be changed after your account has been activated.</p>\n	</dd>\n	<dt id="q-15">\n		<i>15</i> <a href="#">Why can’t I log in to my account?</a></dt>\n	<dd>\n		<p>\n			If you are having trouble logging in to your account, please check that you have:<br />\n			- <a href="#q-12">signed up for an account </a><br />\n			- activated the account via the link sent to your email<br />\n			- entered the correct email address and password on the log in page.<br />\n			If you are still having trouble accessing your account, please <a href="&lt;?php echo base_url();?&gt;en/details/contact-us">contact us</a>.</p>\n	</dd>\n</dl>\n', '2014-04-11 02:10:16', 1, 1),
(10, 7, 0, 'Welcome to website.com''s Help and Support', '<p>\n	Here you can find answers to our most frequently asked questions, or learn more about how to make great deals. If you don''t find what you''re looking for, get in touch.</p>\n', '<h2>\n	Stay Safe</h2>\n<p>\n	At website.com we are 100% committed to making sure that your experience on our site is as safe as possible.&nbsp;</p>\n<p>\n	Here you can find advice on how to stay safe while trading on website.com.</p>\n<div class="section">\n	<div class="photo">\n		<img alt=" - " src="/editor_uploads/images/staysafe-shield.jpg" style="width: 244px; height: 410px;" /></div>\n	<div class="text">\n		<h3>\n			General safety advice</h3>\n		<ul>\n			<li>\n				<strong>Keep things local.</strong> Meet the seller in person, check the item and make sure you are satisfied with it before you make a payment.</li>\n			<li>\n				<strong>Exchange item and payment at the same time.</strong> Buyers – don’t make any payments before receiving an item. Sellers – don’t send an item before receiving payment.</li>\n			<li>\n				<strong>Use common sense.</strong> Avoid anything that appears too good to be true, such as unrealistically low prices and promises of quick money.</li>\n			<li>\n				<strong>Never give out financial information.</strong> This includes bank account details, eBay/PayPal info, and any other information that could be misused.</li>\n		</ul>\n		<h3>\n			Scams and frauds to watch out for</h3>\n		<ul>\n			<li>\n				<strong>Fake payment services.</strong> website.com does not offer any form of payment scheme or protection. Please report any emails claiming to offer such services. Avoid using online payment services or escrow sites unless you are 100% sure that they are genuine.</li>\n			<li>\n				<strong>Fake information requests.</strong> website.com never sends emails requesting your personal details. If you receive an email asking you to provide your personal details to us, do not open any links. Please report the email and delete it.</li>\n			<li>\n				<strong>Fake fee requests.</strong> Avoid anyone that ask for extra fees to buy or sell an item or service. website.com never requests payments for its basic services, and doesn''t allow items that are not located in Ghana, so import and brokerage fees should never be required</li>\n			<li>\n				<strong>Requests to use money transfer services such as Western Union or MoneyGram.</strong> These services are not meant for transactions between strangers and many scams are run through them. Avoid requests to use these services.</li>\n		</ul>\n		<h3>\n			website.com''s safety measures</h3>\n		<p>\n			We work continuously to ensure you have a safe, enjoyable experience on website.com.</p>\n		<p>\n			Our safety measures include:</p>\n		<ul>\n			<li>\n				<strong>Hiding your email address</strong>&nbsp;on ads you post to protect you from spam.&nbsp;</li>\n			<li>\n				<strong>Giving you the option to hide your phone number</strong> on ads you post to protect you from spam.&nbsp;</li>\n			<li>\n				<strong>Making constant improvements to our technology</strong> to detect and prevent suspicious or inappropriate activity behind the scenes.&nbsp;</li>\n			<li>\n				<strong>Tracking reports of suspicious or illegal activity</strong> to prevent offenders from using the site again. &nbsp;</li>\n			<li>\n				<strong>Providing safety advice</strong> to help you protect yourself.</li>\n		</ul>\n		<h3>\n			Reporting a safety issue</h3>\n		<p>\n			If you feel that you have been the victim of a scam, please <a href="#">report your situation</a> to us immediately.</p>\n		<p>\n			If you believe you have been cheated, we also encourage you to contact your local police department.</p>\n	</div>\n</div>\n<p>\n	&nbsp;</p>\n', '2014-04-11 02:54:45', 1, 1),
(11, 8, 0, 'Welcome to website.com''s Help and Support', '<p>\n	Here you can find answers to our most frequently asked questions, or learn more about how to make great deals. If you don''t find what you''re looking for, get in touch.</p>\n', '<p>\n	If you did not find the answer to your question or problem on this page, then please get in touch with us using the form below. We endeavor to answer your messages as soon as possible.</p>\n', '2014-07-07 05:49:11', 1, 1),
(12, 4, 0, 'Welcome to website.com''s Help and Support', '<p>\n	Here you can find answers to our most frequently asked questions, or learn more about how to make great deals. If you don''t find what you''re looking for, get in touch.</p>\n', '<div class="section">\n	<div class="text">\n		<h2>\n			What is website.com?</h2>\n		<p>\n			website.com is a website where you can buy and sell almost everything. The best deals are often done with people who live in your own city or on your own street, so on website.com it''s easy to buy and sell locally. All you have to do is select your region.</p>\n		<p>\n			It''s completely free to publish a classified ad on website.com, and it takes you less than 2 minutes. You can sign up for a free account and post ads easily every time. Or, if you don''t want to register, just go to Post Your Ad, fill in the form, and you''re done.</p>\n		<p>\n			website.com has the widest selection of popular second hand items all over Ghana, which makes it easy to find exactly what you are looking for. So if you''re looking for a car, mobile phone, house, computer or maybe a pet, you will find the best deal on website.com.</p>\n		<p>\n			website.com does not specialize in any specific category - here you can buy and sell items in more than 30 different categories. We also carefully review all ads that are being published, to make sure the quality is up to our standards.</p>\n		<p>\n			If you''d like to get in touch with us, just <a href="#">click here</a>.</p>\n	</div>\n</div>\n', '2014-04-11 03:18:52', 1, 1),
(13, 5, 0, 'Privacy Policy', '<p>\n	Privacy Policy</p>\n', '<ul>\n	<li>\n		In order for the website to provide a safe and useful service, it is important for website.com to collect, use, and share personal information.</li>\n	<li>\n		<strong>Collection.</strong> Information posted on website.com is publicly available. If you choose to provide use with personal information, you are consenting to the transfer and storage of that information on our servers. We collect and store the following personal information:\n		<ul>\n			<li>\n				email address, contact information, and (depending on the service used) sometimes financial information;</li>\n			<li>\n				computer sign-on data, statistics on page views, traffic to and from website.com and response to advertisements;</li>\n			<li>\n				other information, including users'' IP address and standard web log information.</li>\n		</ul>\n	</li>\n	<li>\n		<strong>Use.</strong> We use users'' personal information to:\n		<ul>\n			<li>\n				provide our services</li>\n			<li>\n				resolve disputes, collect fees, and troubleshoot problems;</li>\n			<li>\n				encourage safe trading and enforce our policies;</li>\n			<li>\n				customize users'' experience, measure interest in our services, improve our services and inform users about services and updates;</li>\n			<li>\n				communicate marketing and promotional offers to you according to your preferences;</li>\n			<li>\n				do other things for users as described when we collect the information.</li>\n		</ul>\n	</li>\n	<li>\n		<strong>Disclosure.</strong> We don''t sell or rent users'' personal information to third parties for their marketing purposes without users'' explicit consent. We may disclose personal information to respond to legal requirements, enforce our policies, respond to claims that a posting or other content violates other''s rights, or protect anyone''s rights, property, or safety.</li>\n	<li>\n		<strong>Communication and email tools.</strong> You agree to receive marketing communications about consumer goods and services on behalf of our third party advertising partners unless you tell us that you prefer not to receive such communications. If you don''t wish to receive marketing communications from us, simply indicate your preference by following directions provided with the communication. You may not use our site or communication tools to harvest addresses, send spam or otherwise breach our Terms of Use or Privacy Policy. We may automatically scan and manually filter email messages sent via our communication tools for malicious activity or prohibited content. If you use our tools to send content to a friend, we don''t permanently store your friends'' addresses or use or disclose them for marketing purposes. To report spam from other users, please contact customer support.</li>\n	<li>\n		<strong>Security.</strong> We use lots of tools (encryption, passwords, physical security) to protect your personal information against unauthorized access and disclosure.</li>\n	<li>\n		All personal electronic details will be kept private by the Service except for those that you wish to disclose.</li>\n	<li>\n		It is unacceptable to disclose the contact information of others through the Service.</li>\n	<li>\n		If you violate the laws of your country of residence and/or the terms of use of the Service you forfeit your privacy rights over your personal information.</li>\n	<li>\n		Physical Address: Office 000, POL 0, Monipuri Para Towers, Firmgate, Country Name.</li>\n	<li>\n		Customer Support Email: <a href="mailto:support@website.com">support@website.com</a></li>\n	<li>\n		Customer Support telephone number: +00000000000</li>\n	<li>\n		Unsubscribe information: If at any time you wish to have your information removed from our active databases, please contact us. Additionally, you will be able to unsubscribe anytime by clicking on the unsubscribe link at the bottom of all our email communications.</li>\n	<li>\n		This website makes use of Display Advertising, and uses Remarketing technology with Google Analytics to advertise online. Third-party vendors, including Google, may show our ads on various websites across the Internet, using first-party cookies and third-party cookies together to inform, optimize, and serve ads based on past visits to our website.</li>\n	<li>\n		Visitors can opt-out of Google Analytics for Display Advertising and customize Google Display Network ads using the <a href="#" target="_blank">Ads Preferences Manager</a>.</li>\n</ul>\n', '2014-04-11 04:51:33', 1, 1),
(14, 3, 0, 'Terms & Conditions', '<p>\n	Terms &amp; Conditions</p>\n', '<p>\n	website.com is a service provided by Redress Infotech (subject to your compliance with the Terms and Conditions set forth below). Please read these Terms and Conditions before using this Web Site.</p>\n<p>\n	<strong>General:</strong> Advertisers and users are responsible for ensuring that advertising content, text, images, graphics, video ("Content") uploaded for inclusion on website.com complies with all applicable laws. website.com &amp; Redress Infotech assumes no responsibility for any illegality or any inaccuracy of the Content.&nbsp;</p>\n<p>\n	The advertisers and user guarantees that his or her Content do not violate any copyright, intellectual property rights or other rights of any person or entity, and agrees to release website.com and Redress Infotech from all obligations, liabilities and claims arising in connection with the use of (or the inability to use) the service.</p>\n<p>\n	Advertisers agree that their Content can may be presented through website.com’s partner sites under the same terms and conditions as on website.com.&nbsp;</p>\n<p>\n	<strong>Copyright:</strong> Advertisers grant website.com and Redress Infotech a perpetual, royalty-free, irrevocable, non-exclusive right and license to use, reproduce, modify, adapt, publish, translate, create derivative works from and distribute such Content or incorporate such Content into any form, medium, or technology now known or later developed.</p>\n<p>\n	The material (including the Content, and any other content, software or services) contained on website.com are the property of Redress Infotech , its subsidiaries, affiliates and/or third party licensors. Any intellectual property rights, such as copyright, trademarks, service marks, trade names and other distinguishing brands on the Web Site are the property of Redress Infotech. To be clear: No material on this site may be copied, reproduced, republished, installed, posted, transmitted, stored or distributed without written permission from Redress Infotech.</p>\n<p>\n	<strong>Watermarks:</strong> All images on website.com are watermarked, which prevents the images to be used for other purposes, without the consent of the advertiser.</p>\n<p>\n	<strong>Safety and images:</strong> website.com and Redress Infotech reserves the right to change the title of the Content, for editorial purposes. website.com and Redress Infotech reserves the right not to publish images that are irrelevant or images that violate website.com''s rules.</p>\n<p>\n	<strong>Personal:</strong> website.com and Redress Infotech has the right to cooperate with authorities in the case any Content violates the law. The identity of advertisers, users or buyers may be determined, for example by an ISP. IP addresses may also be registered in order to ensure compliance with the terms and conditions.</p>\n<p>\n	<strong>Privacy:</strong> website.com and Redress Infotech will collect information from Users and Advertisers. It is a condition of use of the website.com that each User and advertiser consents and authorises website.com and Redress Infotech to collect and use this information. website.com and Redress Infotech also reserves the right to disclose it to Company Affiliates and any other person for the purposes of administering, supporting and maintaining website.com, as well as for improving website.com, for example by using the information for research, marketing, product development and planning.</p>\n<p>\n	<strong>Cookies:</strong> This site uses cookies, which means that you must have cookies enabled on your computer in order for all functionality on this site to work properly. A cookie is a small data file that is written to your hard drive when you visit certain Web sites. Cookie files contain certain information, such as a random number user ID that the site assigns to a visitor to track the pages visited. A cookie cannot read data off your hard disk or read cookie files created by other sites. Cookies, by themselves, cannot be used to find out the identity of any user.</p>\n<p>\n	Email Address of Users: Users are required to submit a valid email address, before they are allowed to post advertisements. The email address of the User shall not be publicly displayed and other users are permitted to send email to the User through website.com.</p>\n<p>\n	<strong>Site availability:</strong> website.com and Redress Infotech does not guarantee continuous or secure access to the Web Site. The Web Site is provided "as is" and as and when available.</p>\n<p>\n	<strong>Links to third party websites:</strong> website.com may contain links or references to other websites (''Third Party Websites''). website.com or Redress Infotech shall not be responsible for the contents in Third Party Websites. Third Party Websites are not investigated or monitored. In the event the user decides to leave website.com and access Third Party Sites, the user does so at his/her own risk.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>Paid content</strong>: Advertisers and Users wishing to post content on website.com that requires payment ("Paid Content"), may be required to transmit information through a third-party service provider, which may be governed by its own terms of use. Linking to any third party service providers is at the Users'' and Advertisers'' own risk and website.com disclaims all liability related thereto. Under no circumstances shall website.com be obliged to refund any payments made in respect of Paid Content.</p>\n<p>\n	In the event that Paid Content violates any aspect of these Terms &amp; Conditions, website.com may, in its sole discretion and without refund, remove the Paid Content from website.com. Users and Advertisers may delete any Paid Content prior to the end of the paid-for period, and website.com shall have no further responsibility to display the deleted content. website.com is neither responsible nor liable for the perceived success or failure of any Paid Content posted on website.com.</p>\n<p>\n	<strong>Disclaimer:</strong> website.com and Redress Infotech assume no responsibility what so ever for the use of website.com and disclaims all responsibility for any injury, claim, liability, or damage of any kind resulting from or arising out of or any way related to (a) any errors on website.com or the Content, including but not limited to technical errors and typographical errors, (b) any third party web sites or content directly or indirectly accessed through links in website.com, (c) the unavailability of website.com, (d) your use of website.com or the Content, or (e) your use of any equipment (or software) in connection with website.com</p>\n<p>\n	<strong>Indemnification:</strong> Advertisers and users agree to indemnify website.com &amp; Redress Infotech as well as its officers, directors, employees, agents, from and against all losses, expenses, damages and costs, including attorney’s fees, resulting from any violation of this Terms and Conditions (including negligent or wrongful conduct).</p>\n<p>\n	<strong>Modifications:</strong> website.com &amp; Redress Infotech reserves the right to modify these Terms and Conditions. Such modifications shall be effective immediately upon posting on website.com. You are responsible for the reviewing of such modifications. Your continued access or use of website.com shall be deemed your acceptance of the modified terms and conditions.</p>\n<p>\n	<strong>Governing Law:</strong> website.com is operated under the laws and regulations of Sweden. Advertisers and users agree that Swedish courts, with the district court of Gothenburg as the court of first instance, will have jurisdiction over any dispute or claim relating to the use of website.com.</p>\n', '2014-04-11 04:57:27', 1, 1),
(15, 2, 0, 'Banner Advertising', '<p>\n	Banner Advertizing</p>\n', '<p>\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n<p>\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '2014-04-11 05:10:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `m_alias` varchar(255) NOT NULL,
  `serial` int(11) NOT NULL,
  `page_template` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `last_action_date` datetime NOT NULL,
  `last_action_user` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `name`, `m_alias`, `serial`, `page_template`, `page_title`, `meta_keywords`, `meta_description`, `last_action_date`, `last_action_user`, `status`) VALUES
(1, 'How to sell fast?', 'how-to-sell-fast', 5, 'how-to-sell-fast', 'How to sell fast?', 'How to sell fast', 'How to sell fast', '2014-04-08 18:53:36', 1, 1),
(2, 'Banner Advertising', 'banner-advertising', 10, 'banner-advertising', 'Advertise your brand', 'Advertise your brand ', 'Advertise your brand ', '2014-04-08 18:56:36', 1, 1),
(3, 'Terms & Conditions', 'terms-conditions', 20, 'terms-conditions', 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '2014-04-08 18:56:54', 1, 1),
(4, 'About Us', 'about-us', 15, 'about-us', 'About Us', 'About Us', 'About Us', '2014-04-08 18:56:45', 1, 1),
(5, 'Privacy Policy', 'privacy-policy', 25, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '2014-04-08 18:59:23', 1, 1),
(6, 'FAQ', 'faq', 30, 'faq', 'Help and Support | FAQ', 'Help and Support | FAQ', 'Help and Support | FAQ', '2014-04-08 19:01:36', 1, 1),
(7, 'Stay Safe', 'stay-safe', 35, 'stay-safe', 'Help and Support | Stay Safe', 'Help and Support | Stay Safe', 'Help and Support | Stay Safe', '2014-04-08 19:01:45', 1, 1),
(8, 'Contact Us', 'contact-us', 40, 'contact-us', 'contact Us', 'contact Us', 'contact Us', '2014-04-08 19:01:54', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_info`
--

CREATE TABLE `module_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `module_info`
--

INSERT INTO `module_info` (`id`, `name`) VALUES
(1, 'Main Menu'),
(2, 'Sub Menu'),
(3, 'News '),
(4, 'Information'),
(5, 'Instruction'),
(6, 'Lost & Found'),
(7, 'Police Of The Month'),
(8, 'Proud For'),
(9, 'Blood & Victim Support Request'),
(10, 'Comment'),
(11, 'Online User'),
(12, 'Event'),
(13, 'Usefull Links'),
(14, 'Album'),
(15, 'Gallery'),
(16, 'Advertisement'),
(17, 'Administrative User');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_line` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` longtext CHARACTER SET utf8 NOT NULL,
  `serial` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `head_line`, `details`, `serial`, `status`) VALUES
(1, 'Lorem Ipsum is simply dummy text', '<p>\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 5, 1),
(2, 'There are many variations of passages', '<p>\n There are many variations of passages There are many variations of passages There are many variations of passages There are many variations of passagesThere are many variations of passages There are many variations of passages There are many variations of passages There are many variations of passages</p>', 10, 1),
(3, 'The standard chunk of Lorem Ipsum', '<p>\n Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>', 15, 1),
(4, 'Contrary to popular belief, Lorem Ipsum', '<p>\n Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`id`, `email`, `date`, `status`) VALUES
(1, 'sharif@infobase.com.bd', '2013-10-12', 1),
(2, 'sharif@gmail.com', '2013-10-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_template`
--

CREATE TABLE `page_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `page_template`
--

INSERT INTO `page_template` (`id`, `template_name`) VALUES
(1, 'about-us'),
(5, 'how-to-sell-fast'),
(2, 'banner-advertising'),
(8, 'terms-conditions'),
(9, 'privacy-policy'),
(10, 'faq'),
(11, 'stay-safe'),
(12, 'contact-us');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(96) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `p_status` int(1) NOT NULL COMMENT '1 = Hide; 0= Show',
  `password` varchar(36) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(16) NOT NULL,
  `act_code` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0= inactive; 1=active; 13 = delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id`, `name`, `email`, `phone`, `p_status`, `password`, `last_login_date`, `last_login_ip`, `act_code`, `status`) VALUES
(1, 'Sharif', 'sharif@gmail.com', '01913513255', 1, 'a75d6a841eafd550b0a27293ee054614', '0000-00-00 00:00:00', '', '', 0),
(2, 'Toma Karmokar', 'toma@yahoo.com', '01987680087', 1, '9b89b7713fd72002f29be0c1fc3ff445', '0000-00-00 00:00:00', '', '', 0),
(3, 'A Man', 'man@gmail.com', '099988777', 0, '6531401f9a6807306651b87e44c05751', '0000-00-00 00:00:00', '', '', 0),
(4, 'Watch Man', 'watch@gmail.com', '01965169659', 0, '6ca29d9bb530402bd09fe026ee838148', '0000-00-00 00:00:00', '', '', 0),
(5, 'Coventry Sam', 'coventry012@gmail.com', '01965169659', 0, '69830ca86240b626dd9943f6fe4d54c2', '0000-00-00 00:00:00', '', '', 0),
(6, 'Richmond', 'richmond@gmail.com', '09890899788', 0, '6ca29d9bb530402bd09fe026ee838148', '0000-00-00 00:00:00', '', '', 0),
(7, 'Nana Kofi', 'kofi@gmail.com', '87679000988', 0, '6ca29d9bb530402bd09fe026ee838148', '0000-00-00 00:00:00', '', '', 0),
(10, 'Sharif ul islam', 'sharifbdp@gmail.com', '01965169659', 0, '6ca29d9bb530402bd09fe026ee838148', '2014-06-22 08:34:43', '::1', 'c2hhcmlmYmRwQGdtYWlsLmNvbQaa', 0),
(13, 'Sharif ul islama', 'sharifbdp@gmail.coma', '019651696590', 0, '', '0000-00-00 00:00:00', '', 'c2hhcmlmYmRwQGdtYWlsLmNvbWEa', 5),
(11, 'Sharif Ul islam asdf', 'sharifbdp@live.com', '0987', 0, '6531401f9a6807306651b87e44c05751', '2014-05-24 08:09:34', '127.0.0.1', 'c2hhcmlmYmRwQGxpdmUuY29t', 0),
(14, 'Aminul Islam', 'orionwebtech@gmail.com', '', 0, '6ca29d9bb530402bd09fe026ee838148', '2014-06-23 07:05:13', '::1', 'b3Jpb253ZWJ0ZWNoQGdtYWlsLmNvbQaa', 1),
(15, 'Aminul Islam', 'sharifbdp@aol.com', '01198098765', 0, '6ca29d9bb530402bd09fe026ee838148', '2014-07-09 02:01:53', '::1', 'c2hhcmlmYmRwQGFvbC5jb20a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poster_ad_favorite_list`
--

CREATE TABLE `poster_ad_favorite_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster_id` int(11) NOT NULL,
  `ad_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `poster_ad_favorite_list`
--

INSERT INTO `poster_ad_favorite_list` (`id`, `poster_id`, `ad_id`, `status`) VALUES
(1, 10, 5, 1),
(2, 10, 10, 1),
(3, 1, 2, 1),
(4, 14, 2, 1),
(11, 15, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `poster_location`
--

CREATE TABLE `poster_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `poster_location`
--

INSERT INTO `poster_location` (`id`, `name`, `alias`, `status`) VALUES
(1, 'Accra', 'accra', 1),
(2, 'Kumasi', 'kumasi', 1),
(3, 'Sekondi Takoradi', 'sekondi-takoradi', 1),
(4, 'Ashanti', 'ashanti', 1),
(5, 'Greater Accra', 'greater-accra', 1),
(6, 'Eastern', 'eastern', 1),
(7, 'Belabo', 'belabo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poster_location_city`
--

CREATE TABLE `poster_location_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `poster_location_city`
--

INSERT INTO `poster_location_city` (`id`, `lid`, `name`, `alias`, `status`) VALUES
(1, 1, 'Adenta', 'adenta', 1),
(2, 1, 'Abeka La Paz', 'abeka-la-paz', 1),
(3, 1, 'Abelemkpe', 'abelemkpe', 1),
(4, 1, 'Ablorh Adjei', 'ablorh-adjei', 1),
(5, 1, 'Abokobi', 'abokobi', 1),
(6, 1, 'Aborfu', 'aborfu', 1),
(7, 1, 'Abossey Okai', 'abossey-okai', 1),
(8, 1, 'Accra Central', 'accra-central', 1),
(9, 2, 'Aboabo 1', 'aboabo-1', 1),
(10, 2, 'Aboabo 2', 'aboabo-2', 1),
(11, 2, 'Adum', 'adum', 1),
(12, 2, 'Ahinsan', 'ahinsan', 1),
(13, 2, 'Amakom', 'amakom', 1),
(14, 1, 'Anloga', 'anloga', 1),
(15, 2, 'Anwomaso', 'anwomaso', 1),
(16, 2, 'Apatrapa', 'apatrapa', 1),
(17, 2, 'Asafo', 'asafo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_link`
--

CREATE TABLE `social_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(1) NOT NULL COMMENT '1= FB, 2=Twitter;3=Youtube; 4=Google',
  `link` tinytext NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=inactive, 1=active, 13=delete',
  `last_action_date` datetime NOT NULL,
  `last_action_user` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `social_link`
--

INSERT INTO `social_link` (`id`, `name`, `link`, `status`, `last_action_date`, `last_action_user`) VALUES
(1, 1, 'http://www.facebook.com/id', 1, '2013-10-13 12:02:44', 1),
(2, 2, 'http://www.twitter.com/#/id', 1, '2013-10-13 12:02:51', 1),
(3, 3, 'http://www.youtube.com/pages', 1, '2013-10-13 12:03:02', 1),
(4, 4, 'http://www.plus.google.com/', 13, '2013-02-13 15:21:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(96) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `user_status` int(1) NOT NULL COMMENT '1=power / super user; 2 = normal user',
  `status` int(11) NOT NULL COMMENT '0= inactive; 1=active; 13 = delete',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `last_login_date`, `last_login_ip`, `user_status`, `status`) VALUES
(1, 'Administrator', 'admin@gmail.com', '845129bda003ebeec92f31b74d08f01a', '2014-07-09 02:03:10', '::1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
