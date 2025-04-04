<?php

namespace App\Http\Controllers\frontend;

use Log;
use File;
use Image;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Slider;
use App\Models\Speech;
use App\Models\BankUser;
use App\Models\Category;
use App\Models\District;
use App\Models\NewsTicker;
use App\Models\Designation;
use App\Models\NoticeBoard;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\CentralComitee;
use App\Models\DoharSubComitee;
use App\Models\NawabganjSubComitee;
use App\Http\Controllers\Controller;
use App\Models\AccessoriesPromoSlider;
use Illuminate\Support\Facades\Validator;

class HomeViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::get();
        $notice_boards = NoticeBoard::where('role', 'Notice Board')->latest()->take(3)->get();
        $presidents = Speech::where('role', 'President')->latest()->take(1)->get();
        $secretaries = Speech::where('role', 'Secretary')->latest()->take(1)->get();
        $visions = NoticeBoard::where('role', 'Mission and Vision')->latest()->take(1)->get();
        // $accessories_promo_sliders = AccessoriesPromoSlider::where('status', 1)->latest()->take(1)->get();
        return view('frontview.pages.homepage', compact('sliders', 'categories', 'notice_boards', 'presidents', 'secretaries', 'visions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontview.pages.contact');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobSeekerForm()
    {
        $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
        $thanas = Thana::orderBy('name', 'asc')->where('status', 1)->get();
        $unions = Union::orderBy('name', 'asc')->where('status', 1)->get();
        return view('frontview.pages.jobSeeker_form', compact('districts', 'thanas', 'unions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm()
    {
        $designations = Designation::orderBy('designation', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->where('status', 1)->get();
        $thanas = Thana::orderBy('name', 'asc')->where('status', 1)->get();
        $unions = Union::orderBy('name', 'asc')->where('status', 1)->get();
        return view('frontview.pages.registration_form', compact('designations', 'districts', 'thanas', 'unions'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitRegisterForm(Request $request)
    {
        // Log::info($request);

        $validator = Validator::make($request->all(), [
            'name'               => 'required',
            'email'              => 'required|unique:bank_users|email|min:10',
            'contact'            => 'required|numeric|min:10',
            'father_name'        => 'required|max:20',
            'mother_name'        => 'required|max:20',
            'spouse_name'        => 'required|max:20',
            'birth_date'         => 'required|max:20',
            'nationality'        => 'required|max:20',
            'national_id'        => 'required|numeric|min:10',
            'religion'           => 'required|max:20',
            'bank_name'          => 'required|max:20',
            'designation_id'     => 'required|max:20',
            'blood_group'        => 'required|max:3',
            'district'           => 'required|max:20',
            'thana_id'           => 'required|max:20',
            'union_id'           => 'required|max:20',
            'village_id'         => 'required|max:20',
            'post_office'        => 'required|max:20',
            'branch'             => 'required|max:20',
            'section'            => 'required|max:20',
            'facebook_id'        => 'required|max:20',
            'present_address'    => 'required|max:20',
            'image'              => 'required',
            ],
            [
                'name.required'             => 'Name is required',
                'email.required'            => 'Email is required',
                'email.unique'              => 'Email Already Exists',
                'bank_name.required'        => 'Bank Name is required',
                'father_name.required'      => 'Father Name is required',
                'mother_name.required'      => 'Mother Name is required',
                'spouse_name.required'      => 'Spouse Name is required',
                'birth_date.required'       => 'Date of Birth is required',
                'nationality.required'      => 'Nationality is required',
                'national_id.required'      => 'National ID is required',
                'religion.required'         => 'Religion is required',
                'contact.required'          => 'Contact Number is required',
                'contact.min'               => ' Contact Number must be at least 11 digits.',
                'designation_id.required'   => 'Designation is required',
                'blood_group.required'      => 'Blood Group is required',
                'present_address.required'  => 'Present Address is required',
                'district.required'         => 'District is required',
                'thana_id.required'         => 'Upzila is required',
                'union_id.required'         => 'Union is required',
                'village_id.required'       => 'Village is required',
                'branch.required'           => 'Branch is required',
                'section.required'          => 'Section is required',
                'post_office.required'      => 'Post Office is required',
                'facebook_id.required'      => 'Facebook ID is required',
                'image.required'            => 'Image is required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            # code...

            $bankUser = new BankUser;

            $bankUser->name               = $request->name;
            $bankUser->email              = $request->email;
            $bankUser->contact            = $request->contact;
            $bankUser->father_name        = $request->father_name;
            $bankUser->mother_name        = $request->mother_name;
            $bankUser->spouse_name        = $request->spouse_name;
            $bankUser->birth_date         = $request->birth_date;
            $bankUser->nationality        = $request->nationality;
            $bankUser->nid                = $request->national_id;
            $bankUser->religion           = $request->religion;
            $bankUser->designation_id     = $request->designation_id;
            $bankUser->blood_group        = $request->blood_group;
            $bankUser->district           = $request->district;
            $bankUser->thana_id           = $request->thana_id;
            $bankUser->union_id           = $request->union_id;
            $bankUser->village_id         = $request->village_id;
            $bankUser->post_office        = $request->post_office;
            $bankUser->bank_name          = $request->bank_name;
            $bankUser->branch             = $request->branch;
            $bankUser->section            = $request->section;
            $bankUser->facebook_id        = $request->facebook_id;
            $bankUser->present_address    = $request->present_address;


            if ($request->image) {                                                // find img
                # code...
                $image = $request->file('image');                                 // received img
                $img = time() . '-br.' . $image->getClientOriginalExtension();    // make img name
                $location = public_path('images/user/' . $img);                  // find img location
                Image::make($image)->save($location);                             // save img location
                $bankUser->image  = $img;
            }

            Log::info($bankUser);
            $bankUser->save();
            return response()->json([
                'status' => 200,
                'message' => "Registration Successfully"
            ]);
        }

        // return $this->bankUserService->getAddBankUser($request);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitJobSeekerForm(Request $request)
    {
        $request->validate(
            [
                'name'              => 'required',
                'email'             => 'required|unique:job_seekers|email|min:10',
                'phone'             => 'required|min:11',
                'father_name'       => 'required|max:20',
                'mother_name'       => 'required|max:20',
                'district'          => 'required',
                'thana'             => 'required',
                'union'             => 'required',
                'village'           => 'required|max:20',
                'permanent_address' => 'required|max:20',
                'present_address'   => 'required|max:20',
                'education_details' => 'required|max:20',
            ],
            [
                'name.required'              => 'Name is required',
                'email.required'             => 'Email is required',
                'email.unique'               => 'Email Already Exists',
                'phone.required'             => 'Phone Number is required',
                'father_name.required'       => 'Father Name is required',
                'mother_name.required'       => 'Mother Name is required',
                'district.required'          => 'District Name is required',
                'thana.required'             => 'Thana Name is required',
                'union.required'             => 'Union Name is required',
                'village.required'           => 'Village Name is required',
                'present_address.required'   => 'Present address is required',
                'permanent_address.required' => 'Permanent address is required',
                'education_details.required' => 'Education details is required',
            ]
        );

        $jobSeekerData = [
            'job_id'             => mt_rand(1000, 9999),
            'name'               => $request->name,
            'email'              => $request->email,
            'contact'            => $request->phone,
            'father_name'        => $request->father_name,
            'mother_name'        => $request->mother_name,
            'district'           => $request->district,
            'thana_id'           => $request->thana,
            'union_id'           => $request->union,
            'village'            => $request->village,
            'present_address'    => $request->present_address,
            'permanent_address'  => $request->permanent_address,
            'education_details'  => $request->education_details,
        ];

        // Log::info($jobSeekerData);

        JobSeeker::create($jobSeekerData);
        return response()->json([
            'status' => 200,
            'data' => $jobSeekerData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noticePage(String $id)
    {
        $sliders = Slider::where('status', 1)->get();
        $notice = NoticeBoard::find($id);
        // Log::info($speecher);
        return view('frontview.pages.noticePage', compact('notice', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function speechPage(String $id)
    {
        $sliders = Slider::where('status', 1)->get();
        $speecher = Speech::find($id);
        // Log::info($speecher);
        return view('frontview.pages.speechPage', compact('speecher', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventPage(String $id)
    {
        $sliders = Slider::where('status', 1)->get();
        $category = Category::find($id);
        // Log::info($category);
        return view('frontview.pages.eventPage', compact('category', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function centralCommunity()
    {
        $centralComitees = CentralComitee::orderBy('id', 'desc')->where('current', 1)->get();
        return view('frontview.pages.central_community_page', compact('centralComitees'));
    }

    public function nawabganjSubComitee()
    {
        $nawabganjSubComitees = NawabganjSubComitee::orderBy('id', 'desc')->where('current', 1)->get();
        return view('frontview.pages.nawabganj_subcomitee_page', compact('nawabganjSubComitees'));
    }

    public function doharSubComitee()
    {
        $doharSubComitees = DoharSubComitee::orderBy('id', 'desc')->where('current', 1)->get();
        return view('frontview.pages.dohar_subcomitee_page', compact('doharSubComitees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lifetimeMember()
    {
        $lifetimeMembers = BankUser::orderBy('id', 'asc')->where('designation_id', 'Lifetime Member')->where('status', 1)->get();
        return view('frontview.pages.lifetime_member_page', compact('lifetimeMembers'));
    }

    public function generalMember()
    {
        $generalMembers = BankUser::orderBy('id', 'asc')->where('designation_id', 'General Member')->where('status', 1)->get();
        return view('frontview.pages.general_member_page', compact('generalMembers'));
    }

    public function search()
    {
        return view('frontview.pages.search_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findMember(Request $request)
    {
        if ( $request->thana && $request->union ) {
            # code...
            $search_members = BankUser::where('thana_id', 'LIKE', '%' . $request->thana . '%')
            ->where('union_id', 'LIKE', '%' . $request->union . '%')
            ->get();
            return response()->json(
                ['members'=>$search_members]);
        }
        else {
            // 404 Page not Found
        }
    }

    public function searchStatus(Request $request)
    {

        $search = $request['job_id'] ?? "";
        if ( $search != "" ) {
            # code...
            // $search_job_status = JobSeeker::where('job_id', 'LIKE', '%' . $request->job_id . '%')
            // ->get();
            $search_job_status = JobSeeker::where('job_id', 'LIKE', '%' . $search . '%')->first();
            if ($search_job_status != "") {
                # code...
                return view('frontview.pages.status_and_feedback_page', compact('search_job_status'));
            }else {
                # code...
                $notification = array (
                    'message' => 'Not Found Your Job Status. Forget Your JOB ID, Please Contact With Us.',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }

            // Log::info($search_job_status);
            // return view('frontview.pages.status_and_feedback_page', compact('search_job_status'));

        }
        else {
            $notification = array (
                'message' => 'Please Enter Your JOB ID!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function feedbackStatus(Request $request) {
        // Log::info($request);
        $jobSeeker_id = $request['jobSeeker_id'];
        $jobSeeker = JobSeeker::find($jobSeeker_id);
        Log::info($jobSeeker);
        if( !is_null( $jobSeeker ) ) {
            $jobSeeker->job_id          = $request->job_id;
            $jobSeeker->status          = $request->status;
            $jobSeeker->comment         = $request->comment;
            $jobSeeker->feedback        = $request->feedback;

            // dd($jobSeeker);
            // exit();
            $jobSeeker->save();
            $notification = array (
                'message' => 'Feedback send Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('search.job.status')->with($notification);
        }
        else {
            // 404 Page not Found
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
