<?php
class Webdesign extends Controller {

    public function index() {

        // ✅ SEO title & description
        $data['page_title'] = 'palmsol Technology | Web Design & Development Agency in Lagos';
        $data['meta_description'] = 'palmsol Technology is a professional web design and development agency in Lagos, Nigeria. We build responsive, SEO-optimized websites, e-commerce platforms, and SaaS applications to help businesses grow online.';

        // ✅ Meta keywords
        $data['meta_keywords'] = 'web design Lagos, web development Lagos, website agency Nigeria, e-commerce solutions Lagos, SaaS development Nigeria, custom websites Lagos, palmsol Technology';

        // ✅ Business identity (LocalBusiness schema)
        $data['business_name'] = 'palmsol Technology';
        $data['business_image'] = 'https://palmsoltechnology.com/images/logo.png';
        $data['business_id']    = ROOT.'webdesign';
        $data['business_url']   = ROOT.'webdesign';
        $data['telephone']      = '+2349031499108';
        $data['price_range']    = '$$';

        // ✅ Address
        $data['street']         = ' Lekki Phase1, Lagos state';
        $data['locality']       = 'Lagos';
        $data['region']         = 'LA';
        $data['postal_code']    = '100001';
        $data['country']        = 'NG';

        // ✅ Geo coordinates
        $data['latitude']       = 3.3792;
        $data['longitude']      = 6.5244;

        // ✅ Opening hours
        $data['opening_days']   = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $data['opening_time']   = '09:00';
        $data['closing_time']   = '18:00';

        // ✅ Social links
        $data['same_as']        = [
            "https://web.facebook.com/palmsoldigital/",
            "https://www.linkedin.com/company/palmsoltechnology",
            "https://x.com/palmsoltech?t=roKEvbKi8wuX1nW81lMczA&s=09"
        ];

        // ✅ Business description
        $data['business_description'] = 'palmsol Technology is a leading Lagos-based web design and development agency. We create fast, secure, and SEO-friendly websites, e-commerce stores, and SaaS solutions that help Nigerian businesses thrive in the digital space.';

        // ✅ Services / Offers (SEO-friendly)
        $data['offers'] = [
            [
                "name" => "Custom Website Design & Development",
                "description" => "We design and develop responsive, SEO-optimized websites that drive business growth in Lagos and across Nigeria."
            ],
            [
                "name" => "E-Commerce Development",
                "description" => "We build scalable, secure e-commerce platforms with payment gateway integration to help businesses sell online."
            ],
            [
                "name" => "SaaS Application Development",
                "description" => "Tailor-made SaaS applications that streamline business processes and improve efficiency."
            ],
            [
                "name" => "Website Optimization & Maintenance",
                "description" => "Ongoing support, updates, and optimization to ensure your website stays fast, secure, and up-to-date."
            ],
            [
                "name" => "Digital Marketing & SEO",
                "description" => "Search engine optimization, social media marketing, and online advertising to boost visibility and sales."
            ]
        ];

        // ✅ Load the view
        $this->view("palmsol/web", $data);
    }
}
