<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $homeHTML = '
            <section id="content">
                <div class="content-wrap overflow-visible py-0">
                    <div class="container">

                        <div class="position-relative p-5 mb-4 z-3 rounded shadow bg-white service-feature mt-5">
                            <div class="row align-items-center justify-content-center grid-border">
                                <div class="col-lg-3 text-center mb-5 mb-lg-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/decision-making.png" alt="Counter Icon" width="70" class="mb-4">
                                    <div class="counter color fw-normal mb-2"><span class="display-4 fw-bold" data-from="40" data-to="175" data-refresh-interval="100" data-speed="2000"></span></div>
                                    <h5 class="mb-0 h6 nott">Commission <br>Decision</h5>
                                </div>

                                <div class="col-lg-3 text-center mb-5 mb-lg-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/review.png" alt="Counter Icon" width="70" class="mb-4">
                                    <div class="counter color fw-normal mb-2"><span class="display-4 fw-bold" data-from="0" data-to="271" data-refresh-interval="100" data-speed="2000"></span></div>
                                    <h5 class="mb-0 h6 nott">Mergers <br>Reviewed</h5>
                                </div>

                                <div class="col-lg-3 text-center mb-5 mb-lg-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/complain.png" alt="Counter Icon" width="70" class="mb-4">
                                    <div class="counter color fw-normal mb-2"><span class="display-4 fw-bold" data-from="100" data-to="881" data-refresh-interval="100" data-speed="2000"></span></div>
                                    <h5 class="mb-0 h6 nott">Enforcement Complaints & Inquiries Addressed</h5>
                                </div>
                                
                                <div class="col-lg-3 text-center mb-5 mb-lg-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/studies.png" alt="Counter Icon" width="70" class="mb-4">
                                    <div class="counter color fw-normal mb-2"><span class="display-4 fw-bold" data-from="100" data-to="873" data-refresh-interval="100" data-speed="2000"></span></div>
                                    <h5 class="mb-0 h6 nott">Market Studies & Issues Paper Completed</h5>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                        
                        <div class="row">
                            <div class="col-md-6 offset-md-3 hsrch">
                                {Search Form}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
            <section>
                <div class="row align-items-stretch mx-0 topmargin bottommargin-lg">
                        <div class="col-lg-3 bg-color">
                            <div class="col-padding">
                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/folder.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content align-items-center justify-content-between">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Transparency Seal</a></h3>
                                    </div>
                                </div>

                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/request.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">FOI Requests</a></h3>   
                                    </div>
                                </div>

                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/procurement.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Procurement</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/career.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Careers</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/folder.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">FOI</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/citizen.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Citizen Charter</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box flex-md-row-reverse text-md-end border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/gender.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Gender and Development</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="background-color: #E5E5E5;">
                            <div style="padding: 40px;">
                                <div class="heading-block border-bottom-0 center mx-auto mb-0" style="max-width: 550px">
                                    <h3 class="nott ls0 mb-5">Whats New</h3>
                                </div>
                                
                                <div id="related-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="30" data-nav="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-xl="2">
                                    {Featured Articles}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 bg-color">
                            <div class="col-padding">
                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/file.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">File a Complaint</a></h3>
                                    </div>
                                </div>

                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/notification.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">MAO e-Notifications</a></h3>
                                    </div>
                                </div>

                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/subscription.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Subscriptions</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/folder.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">iCLP</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/studies.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Market Studies</a></h3>
                                    </div>
                                </div>
                                
                                <div class="feature-box border-0">
                                    <img src="'.\URL::to('/').'/theme/images/icons/outreach.png" alt="Counter Icon" width="35" class="mb-4">
                                    <div class="fbox-content">
                                        <h3 class="nott ls0"><a href="#" class="text-white">Competition Orientation Outreach Program</a></h3>
                                    </div>
                                </div>

                                <div class="feature-box border-0">
                                    <div class="fbox-content bg-light pt-3 mt-2">
                                        <h3>Philippine Standard Time</h3>
                                        <h6>{PST}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            
            <section class="bottommargin-lg">
                <div class="container">                 
                    <div class="row mt-4 mt-lg-0 bottommargin-md d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                        <p class="text-center">
                            <a href="https://www.facebook.com/competitionph/" class="d-inline" target="_blank"><i class="icon-facebook-sign icon-2x"></i></a>
                            <a href="https://twitter.com/competitionph/" class="d-inline" target="_blank"><i class="icon-twitter-sign icon-2x"></i></a>
                            <a href="#" class="d-inline" target="_blank"><i class="icon-linkedin-sign icon-2x"></i></a>
                            <a href="#" class="d-inline" target="_blank"><i class="icon-youtube-sign icon-2x"></i></a>
                        </p>
                    </div>
                </div>
            </section>';


        $aboutHTML = '
            <div class="fancy-title title-border">
                <h2>Vision</h2>
            </div>
            <p>PCC aims to be a world-class authority in promoting fair market competition to help achieve a vibrant and inclusive economy and to advance consumer welfare.</p>
            
            <div class="fancy-title title-border">
                <h2>Mission</h2>
            </div>
            <p>PCC shall prohibit anti-competitive agreements, abuses of dominant position, and anti-competitive mergers and acquisitions. Sound market regulation will help foster business innovation, increase global competitiveness, and expand consumer choice to improve public welfare.</p>
            <p>The PCC has original and primary jurisdiction over the enforcement and implementation of the PCA and its Implementing Rules and Regulations. Its mandate includes:</p>
            <ul class="ps-4">
                <li>Review of mergers and acquisitions.</li>
                <li>Investigation and adjudication of antitrust cases.</li>
                <li>Imposition of sanctions and penalties.</li>
                <li>Conduct of economic and legal research on competition-related matters.</li>
                <li>Issuance of advisory opinions.</li>
                <li>Advocating pro-competition culture in government and businesses.</li>
            </ul>';


        $contactUsHTML = '
            <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.080236439865!2d121.03386061484076!3d14.651386639770106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b702f9b204e5%3A0xd0838bc975cbc047!2sVertis+North+Corporate+Center!5e0!3m2!1sen!2sph!4v1528184082646" height="550" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';

        $footerHTML = '
            <footer id="footer" class="bg-color dark border-warning">
            <div class="container">
                <div class="footer-widgets-wrap">
                    <div class="row col-mb-50">
                        <div class="col-lg-2 col-sm-6">
                            <div class="widget clearfix">
                                <img src="'.\URL::to('/').'/theme/images/misc/seal-of-the-republic-of-the-philippines.jpg" />
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            <div class="widget widget_links clearfix">
                                <h4>Republic of the Philippines</h4>
                                <p>All content is in the public domain unless otherwise stated.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-6">
                            <div class="widget widget_links clearfix">
                                <h4>About GOVPH</h4>
                                <p>Learn more about the Philippine government, its structure, how government works and the people behind it.</p>
                                
                                <ul>
                                    <li><a href="#" target="_blank">GOV.PH</a></li>
                                    <li><a href="#" target="_blank">Open Data Portal</a></li>
                                    <li><a href="#" target="_blank">Official Gazette</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget widget_links clearfix">
                                <h4>Government Links</h4>
                                <ul class="">
                                    <li><a href="#" target="_blank">Office of the President</a></li>
                                    <li><a href="#" target="_blank">Office of the Vice President</a></li>
                                    <li><a href="#" target="_blank">Senate of the Philippines</a></li>
                                    <li><a href="#" target="_blank">House of Representatives</a></li>
                                    <li><a href="#" target="_blank">Supreme Court</a></li>
                                    <li><a href="#" target="_blank">Court of Appeals</a></li>
                                    <li><a href="#" target="_blank">Sandiganbayan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>';

      
        $pages = [
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 1,
            //     'slug' => 'home',
            //     'name' => 'Home',
            //     'label' => 'Home',
            //     'contents' => $homeHTML,
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'default',
            //     'image_url' => '',
            //     'meta_title' => 'Home',
            //     'meta_keyword' => 'home',
            //     'meta_description' => 'Home page',
            //     'user_id' => 1,
            //     'template' => 'home',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'about-us',
            //     'name' => 'About Us',
            //     'label' => 'About Us',
            //     'contents' => $aboutHTML,
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'standard',
            //     'image_url' => \URL::to('/').'/theme/images/bg.jpg',
            //     'meta_title' => 'About Us',
            //     'meta_keyword' => 'About Us',
            //     'meta_description' => 'About Us page',
            //     'user_id' => 1,
            //     'template' => '',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],

            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'contact-us',
            //     'name' => 'Contact Us',
            //     'label' => 'Contact Us',
            //     'contents' => $contactUsHTML,
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'standard',
            //     'image_url' => '',
            //     'meta_title' => 'Contact Us',
            //     'meta_keyword' => 'Contact Us',
            //     'meta_description' => 'Contact Us page',
            //     'user_id' => 1,
            //     'template' => 'contact-us',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'news',
            //     'name' => 'News and Updates',
            //     'label' => 'News and Updates',
            //     'contents' => '',
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'customize',
            //     'image_url' => '',
            //     'meta_title' => 'News',
            //     'meta_keyword' => 'news',
            //     'meta_description' => 'News page',
            //     'user_id' => 1,
            //     'template' => 'news',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'footer',
            //     'name' => 'Footer',
            //     'label' => 'footer',
            //     'contents' => $footerHTML,
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'default',
            //     'image_url' => '',
            //     'meta_title' => '',
            //     'meta_keyword' => '',
            //     'meta_description' => '',
            //     'user_id' => 1,
            //     'template' => '',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'careers',
            //     'name' => 'Careers',
            //     'label' => 'Careers',
            //     'contents' => '',
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'customize',
            //     'image_url' => '',
            //     'meta_title' => 'Careers',
            //     'meta_keyword' => 'careers',
            //     'meta_description' => 'Careers page',
            //     'user_id' => 1,
            //     'template' => 'careers',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'resource-list',
            //     'name' => 'Resources',
            //     'label' => 'Resources',
            //     'contents' => '',
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'customize',
            //     'image_url' => '',
            //     'meta_title' => 'Resources',
            //     'meta_keyword' => 'resources',
            //     'meta_description' => 'Resources page',
            //     'user_id' => 1,
            //     'template' => 'resources',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            // [
            //     'parent_page_id' => 0,
            //     'album_id' => 0,
            //     'slug' => 'mergers-acquisition',
            //     'name' => 'Mergers Acquisition',
            //     'label' => 'Mergers Acquisition',
            //     'contents' => '',
            //     'status' => 'PUBLISHED',
            //     'page_type' => 'customize',
            //     'image_url' => '',
            //     'meta_title' => 'Mergers Acquisition',
            //     'meta_keyword' => 'mergers acquisition',
            //     'meta_description' => 'Mergers Acquisition page',
            //     'user_id' => 1,
            //     'template' => 'mergers-acquisition',
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'commision-issuance',
                'name' => 'Commission Issuance',
                'label' => 'Commission Issuance',
                'contents' => '',
                'status' => 'PUBLISHED',
                'page_type' => 'customize',
                'image_url' => '',
                'meta_title' => 'Commission Issuance',
                'meta_keyword' => 'commision-issuance',
                'meta_description' => 'Commission Issuance',
                'user_id' => 1,
                'template' => 'commision-issuance',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('pages')->insert($pages);
    }
}
