<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\BloodGroup;
use App\Models\District;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Village;
use App\Models\BankUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\BankUserService;
use File;
use Image;
use Log;

class BankUserController extends Controller
{
    protected $bankUserService;
    public function __construct(BankUserService $bankUserService) {
        $this->bankUserService = $bankUserService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::orderBy('designation', 'asc')->get();
        $bloodGroups = BloodGroup::orderBy('blood_group', 'asc')->get();
        $bankUsers = BankUser::orderBy('id', 'desc')->where('status', 1)->orWhere('status', 0)->get();
        return view('backend.bankUser.manage', compact('designations', 'bloodGroups', 'bankUsers'));
    }

    /**
     * Display a listing of the resource.
     */
    public function pending()
    {
        $designations = Designation::orderBy('designation', 'asc')->get();
        $bloodGroups = BloodGroup::orderBy('blood_group', 'asc')->get();
        $bankUsers = BankUser::orderBy('id', 'desc')->where('status', 2)->get();
        return view('backend.bankUser.pending_resgistration', compact('designations', 'bloodGroups', 'bankUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::orderBy('designation', 'asc')->get();
        $thanas = Thana::orderBy('name', 'asc')->get();
        $unions = Union::orderBy('name', 'asc')->get();
        $villages = Village::orderBy('name', 'asc')->get();
        return view('backend.bankUser.create', compact('designations', 'thanas', 'unions', 'villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'national_id'        => 'required|max:20',
            'religion'           => 'required|max:20',
            'bank_name'          => 'required|max:20',
            'designation_id'     => 'required|max:25',
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
            'status'             => 'required',
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
            'status.required'           => 'Status is required',
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
            $bankUser->status             = $request->status;


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
                'message' => "Bank User Added Successfully"
            ]);
        }

        // return $this->bankUserService->getAddBankUser($request);
    }

    public function edit(Request $request)
    {
        $id = $request['id'];
        $bankUser = BankUser::find($id);

        $bankUser->thana_name=$bankUser->thana->name;
        $bankUser->union_name=$bankUser->union->name;
        $bankUser->village_name=$bankUser->village->name;
        $bankUser->designation_name = $bankUser->designation->designation;
        // $designations = Designation::orderBy('designation', 'asc')->get();
        // $thanas = Thana::orderBy('name', 'asc')->get();
        // $unions = Union::orderBy('name', 'asc')->get();
        // $villages = Village::orderBy('name', 'asc')->get();
        // $data = compact('bankUser', 'designations', 'thanas', 'unions', 'villages');
        // log::info($data);
        // return response()->json([$bankUser, $designations, $thanas, $unions, $villages]);
        return response()->json($bankUser);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'               => 'required',
            'email'              => 'required|unique:bank_users,email,' . $request->bankUser_id . '|email|min:10',
            'contact'            => 'required|digits:11',
            'father_name'        => 'required|max:20',
            'mother_name'        => 'required|max:20',
            'spouse_name'        => 'required|max:20',
            'birth_date'         => 'required|max:20',
            'nationality'        => 'required|max:20',
            'national_id'        => 'required|max:20|unique:bank_users,nid,' . $request->bankUser_id,
            'religion'           => 'required|max:20',
            'bank_name'          => 'required|max:20',
            'designation_id'     => 'required|max:25',
            'blood_group'        => 'required|max:20',
            'district'           => 'required|max:20',
            'thana_id'           => 'required|max:20',
            'union_id'           => 'required|max:20',
            'village_id'         => 'required|max:20',
            'post_office'        => 'required|max:20',
            'branch'             => 'required|max:20',
            'section'            => 'required|max:20',
            'facebook_id'        => 'required|max:20',
            'present_address'    => 'required|max:20',
            'status'             => 'required',
            'image'              => 'mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $bankUser = BankUser::find($request->bankUser_id);

            if ($request->image) {                                                // find img
                # code...
                // Delete Old Image
                if (File::exists('images/user/' . $bankUser->image)) {
                    # code...
                    File::delete('images/user/' . $bankUser->image);
                }

                $image = $request->file('image');                                 // received img
                $img = time() . '-br.' . $image->getClientOriginalExtension();    // make img name
                $location = public_path('images/user/' . $img);                  // find img location
                Image::make($image)->save($location);                             // save img location
                $bankUser->image = $img;                                             // save img
            } else {
                # code...
                $bankUser->image = $request->bankUser_img;
            }
            if( !is_null( $bankUser ) ) {

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
                $bankUser->status             = $request->status;

                $bankUser->save();

                // $bankUserData = [
                //     'name'               => $request->name,
                //     'email'              => $request->email,
                //     'contact'            => $request->contact,
                //     'father_name'        => $request->father_name,
                //     'mother_name'        => $request->mother_name,
                //     'spouse_name'        => $request->spouse_name,
                //     'birth_date'         => $request->birth_date,
                //     'nationality'        => $request->nationality,
                //     'national_id'        => $request->national_id,
                //     'religion'           => $request->religion,
                //     'designation_id'     => $request->designation_id,
                //     'blood_group'        => $request->blood_group,
                //     'district'           => $request->district,
                //     'thana_id'           => $request->thana_id,
                //     'union_id'           => $request->union_id,
                //     'village_id'         => $request->village_id,
                //     'post_office'        => $request->post_office,
                //     'bank_name'          => $request->bank_name,
                //     'branch'             => $request->branch,
                //     'section'            => $request->section,
                //     'facebook_id'        => $request->facebook_id,
                //     'present_address'    => $request->present_address,
                //     'status'             => $request->status,
                //     'image'              => $img,
                // ];
                // BankUser::where('id', $request->bankUser_id)->update($bankUserData);
                return response()->json([
                    'status' => 200,
                    'message' => "User Updated Successfully"
                ]);
            }
        }

        // return $this->bankUserService->getUpdatedBankUser($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {

		$bankUser = BankUser::find($request->id);
        // log::info($request);
        // $bankUser->delete();
        if (File::exists('images/user/' . $bankUser->image)) {
            # code...
            File::delete('images/user/' . $bankUser->image);
        }

		BankUser::destroy($request->id);
        return response()->json([
            'status' => 200,
            'messages' => 'Deleted Successfully'
        ]);
	}
}
