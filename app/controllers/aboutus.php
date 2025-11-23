<?php
class Aboutus extends Controller {

    public function index() {

        // SEO title & description
        $data['page_title'] = 'palmsol Technology - About us';
        $data['meta_description'] = 'palmsol Technology delivers expert web design, ICT & networking, digital marketing, ICT support, and value-added services in Lagos. Trusted since 2018. Get your free project plan today.';

        //  Meta keywords
        $data['meta_keywords'] = 'web design Lagos, ICT networking Nigeria, digital marketing Lagos, ICT support, VAS, palmsol Technology, tech company Lagos';

        // LocalBusiness schema pieces
        $data['business_name'] = 'palmsol Technology';
        $data['business_image'] = 'https://palmsoltechnology.com/path-to-your-main-image.jpg';
        $data['business_id']    = 'https://palmsoltechnology.com/';
        $data['business_url']   = 'https://palmsoltechnology.com/';
        $data['telephone']      = '+2347047966901';
        $data['price_range']    = '$$';

        // Address
        $data['street']         = '13D Kenneth Agbakuru Street, Lekki Phase 1';
        $data['locality']       = 'Lagos';
        $data['region']         = 'LA';
        $data['postal_code']    = '100001';
        $data['country']        = 'NG';

        // Geo
        $data['latitude']       = 6.442708;
        $data['longitude']      = 3.483333;

        // Opening hours
        $data['opening_days']   = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        $data['opening_time']   = '09:00';
        $data['closing_time']   = '18:00';

        // Social links
        $data['same_as']        = [ "https://www.facebook.com/share/1AzNwFatai/"];

        // Description
        $data['business_description'] = 'palmsol Technology is a Lagos-based tech company specializing in web design, ICT & networking, digital marketing, ICT support, and value-added services for businesses across Nigeria.';

        // Services / Offers
        $data['offers'] = [
            [
                "name" => "Website Design & Development",
                "description" => "Mobile-first, SEO-ready websites for businesses in Lagos and across Nigeria."
            ],
            [
                "name" => "ICT & Networking Solutions",
                "description" => "Reliable ICT and network infrastructure setup and support."
            ],
            [
                "name" => "Digital Marketing",
                "description" => "SEO, social media marketing, and online advertising that drives business growth."
            ],
            [
                "name" => "ICT Support",
                "description" => "Technical support, troubleshooting, and IT management services."
            ],
            [
                "name" => "Value-Added Services (VAS)",
                "description" => "Custom telecom and digital solutions to give your business a competitive advantage."
            ]
        ];
        $this->view("palmsol/header2", $data);
        $this->view("palmsol/about", $data);
        
        $this->view("palmsol/footer", $data);
       
       
    }
}
