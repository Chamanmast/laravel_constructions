<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\EnquiryMail;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    // Define the number of items to paginate per page
    public $paginate = 6;

    /**
     * Constructor to initialize pagination setting from site settings
     */
    public function __construct()
    {
        // Retrieve the pagination value from the site settings and set it
        $this->paginate = SiteSetting::find(1)->pagination;
    }

    /**
     * Display the home page view
     *
     * @return \Illuminate\View\View
     */
    public function Home()
    {
        return view('welcome');
    }

    /**
     * Display the about us page view with site settings
     *
     * @return \Illuminate\View\View
     */
    public function About()
    {
        // Get the site settings and the menu item with id 1
        $template = SiteSetting::find(1);
        $m = Menu::where('id', 1)->first();

        // Return the view with the site settings
        return view('about-us', compact('template'));
    }

    /**
     * Display the services page view
     *
     * @return \Illuminate\View\View
     */
    public function Services()
    {
        return view('services');
    }

    /**
     * Display the portfolio page view with categories and portfolio items
     *
     * @return \Illuminate\View\View
     */

    /**
     * Display the blog listing page view with pagination
     *
     * @return \Illuminate\View\View
     */
    public function Blogs()
    {
        // Get the site settings
        $template = SiteSetting::Select('pagination')->find(1);

        // Retrieve the blog posts with pagination
        $blogs = Blog::select('id', 'blogcat_id', 'post_title', 'post_slug', 'post_image', 'short_descp', 'user_id', 'created_at')
            ->with(['category:id,category_name'])
            ->where('status', 0)
            ->latest()
            ->paginate($template->pagination);

        // Return the view with the blogs and site settings
        return view('blogs', compact('blogs', 'template'));
    }

    /**
     * Display the details of a specific blog post
     *
     * @return \Illuminate\View\View
     */
    public function BlogDetails(Request $request, string $blog_slug)
    {
        // Retrieve the specific blog post by its slug
        $blog = Blog::where('post_slug', $blog_slug)->where('status', 0)->first();

        // Return the view with the blog post details
        return view('blogdetails', compact('blog'));
    }

    public function ServiceDetails(Request $request, int $id)
    {

        // Retrieve the specific blog post by its slug
        $service = Service::where('id', $id)
            ->where('status', 0)
            ->first();

        // dd($service);
        // Return the view with the blog post details
        return view('servicedetails', compact('service'));
    }
    public function Servicesubmit(Request $request)
    {
        dd($request);


        $temp = SiteSetting::select('site_title', 'email')->find(1);
        // Send the enquiry email
        Mail::to($temp->email) // Replace with your email
            ->send(new EnquiryMail($data));


        return back()->with('success', 'Your enquiry has been sent successfully!');
    }
    public function ServiceDetailsBySlug(Request $request, string $slug)
    {

        // Retrieve the specific blog post by its slug
        $service = Service::where('slug', $slug)
            ->where('status', 0)
            ->first();

        // dd($service);
        // Return the view with the blog post details
        return view('servicedetails', compact('service'));
    }
    public function Brands()
    {

        // Retrieve the specific blog post by its slug
        $logos = Brand::select('name', 'image')
            ->where('status', 0)
            ->get();

        // dd($service);
        // Return the view with the blog post details
        return view('brands', compact('logos'));
    }
    public function Project()
    {
        // Get active categories and portfolio items

        $projects = Project::active(0)->get();

        // Return the view with the categories and portfolio items
        return view('project', compact('projects'));
    }

    public function ProjectDetails(Request $request, string $slug)
    {

        // Retrieve the specific portfolio by its id
        $project = Project::where('slug', $slug)->where('status', 0)->first();

        // Return the view with the portfolio post details
        return view('projectdetails', compact('project'));
    }

    /**
     * Display the contact us page view
     *
     * @return \Illuminate\View\View
     */
    public function Contact()
    {
        // Get the site settings and the menu item with id 4
        $template = SiteSetting::find(1);
        $m = Menu::where('id', 4)->first();
        // Return the view with the site settings
        $captcha = generateCaptcha();

        return view('contact-us', compact('template', 'captcha'));
    }

    /**
     * Handle the contact form submission
     *
     * @return \Illuminate\View\View
     */
    public function ContactSend(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:50',
            'message' => 'required',
            'captcha' => 'required',
        ]);

        if (! validateCaptcha($request->input('captcha'))) {
            return back()->withErrors(['captcha' => 'Incorrect CAPTCHA answer.']);
        }

        $temp = SiteSetting::select('site_title', 'email')->find(1);

        $subject = 'Enquriy Form ' . $temp->site_title;
        // Prepare the data to be sent in the email
        $data = [
            'name' => $request->name,
            'subject' => $subject,
            'email' => $request->email,
            'message' => $request->message,
        ];



        // Send the contact email
        Mail::to($temp->email)->send(new ContactMail($data));

        // Prepare a notification message
        $notification = [
            'message' => 'Thank You for contacting us',
            'alert-type' => 'success',
        ];

        // Return the contact us view with the notification
        return view('thankyou')->with($notification);
    }

    public function Thankyou()
    {
        return view('thankyou');
    }
}
