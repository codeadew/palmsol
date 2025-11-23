<?php
class Marketing extends Controller {

    public function index() {

        // ✅ SEO title & description
        $data['page_title'] = 'Digital Marketing Agency in Lagos | SEO, Social Media & Ads';
        $data['meta_description'] = 'palmsol Technology offers professional digital marketing in Lagos — SEO, social media management, PPC ads, and content marketing to grow your business online.';

        // ✅ Meta keywords
        $data['meta_keywords'] = 'digital marketing Lagos, SEO services Nigeria, social media ads Lagos, PPC agency Nigeria, content marketing Lagos, online advertising Nigeria';

        // ✅ Business identity (LocalBusiness schema pieces)
        $data['business_name'] = 'palmsol Technology Digital Marketing Services';
        $data['business_id']    = 'https://palmsoltechnology.com/';
        $data['business_url']   = ROOT.'marketing';
        $data['telephone']      = '+2349031499108';
        

        // ✅ Address
        $data['street']         = '13D Kenneth Agbakuru Street, Lekki Phase 1';
        $data['locality']       = 'Lagos';
        $data['region']         = 'LA';
        $data['postal_code']    = '100001';
        $data['country']        = 'NG';

        // ✅ Geo coordinates
        $data['latitude']       = 6.442708;
        $data['longitude']      = 3.483333;

        // ✅ Opening hours
        $data['opening_days']   = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $data['opening_time']   = '09:00';
        $data['closing_time']   = '18:00';

        // ✅ Social links
        $data['same_as']        = [
            "https://web.facebook.com/palmsoldigital/",
            "https://www.linkedin.com/company/palmsoltechnology",
            "https://x.com/palmsoltech"
        ];

        // ✅ Business description
        $data['business_description'] = 'palmsol Technology is a Lagos-based digital marketing agency helping Nigerian businesses grow through SEO, social media management, online advertising, and content marketing strategies.';

        // ✅ Schema offers
        $schema['makesOffer'][] = [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "Service",
                "name" => "SEO & Search Marketing",
                "description" => "Improve your website ranking and drive organic traffic through SEO strategies tailored for Lagos and Nigeria."
            ]
        ];
        $schema['makesOffer'][] = [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "Service",
                "name" => "Social Media Marketing",
                "description" => "Boost your brand awareness with creative social media campaigns and targeted advertising."
            ]
        ];
        $schema['makesOffer'][] = [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "Service",
                "name" => "Pay-Per-Click Advertising",
                "description" => "Maximize ROI with Google Ads, Facebook Ads, and other PPC campaigns."
            ]
        ];
        $schema['makesOffer'][] = [
            "@type" => "Offer",
            "itemOffered" => [
                "@type" => "Service",
                "name" => "Content Marketing",
                "description" => "Engage your audience with compelling blog posts, graphics, and video content."
            ]
        ];

        $data['schema'] = $schema;

        // ✅ Load views (header + content page)
        $this->view("palmsol/header_3d", $data);
        $this->view("palmsol/digital", $data);
        $this->view("palmsol/footer_3d", $data);
    }
}
