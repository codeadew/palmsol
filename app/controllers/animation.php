<?php
class Animation extends Controller {

    public function index() {

        // SEO title & description
        $data['page_title'] = '3D Solutions in Lagos | Event Design, Virtual Tours & Product Activations';
        $data['meta_description'] = 'Bring your designs to life with our immersive 3D solutions in Lagos—360 virtual tours, event design, product activation visuals, and 3D renderings. Get a quote today!';

        //  Meta keywords
        $data['meta_keywords'] = '3D solutions Lagos, virtual tour Nigeria, 3D event design Lagos, product activation 3D, 3D exterior interior rendering';

        // LocalBusiness schema pieces
        $data['business_name'] = 'Palmsol Technology 3D Animation Services';
        
        $data['business_id']    = 'https://palmsoltechnology.com/';
        $data['business_url']   =  ROOT.' animation';
        $data['telephone']      = '+2349031499108';
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
        $data['business_description'] = 'Palmsol Technology is a Lagos-based tech company specializing in web design, ICT & networking, digital marketing, ICT support, and value-added services for businesses across Nigeria.';

        // Services / Offers
       $schema['makesOffer'][] = [
        "@type" => "Offer",
        "itemOffered" => [
            "@type" => "Service",
            "name" => "3D Solutions – Virtual Tours, Event Design, Renderings",
            "description" => "Immersive 360 virtual tours, event design, interior/exterior 3D renderings, and product activation visuals in Lagos."
        ]
        ];

         $data['schema'] = $schema;
         
        $this->view("palmsol/header_3d", $data);
        $this->view("palmsol/3d", $data);
        $this->view("palmsol/footer_3d", $data);
        
       
       
       
    }
}
