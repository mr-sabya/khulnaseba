<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use App\Models\Blog;
use App\Models\BloodDonor;
use App\Models\Bus;
use App\Models\BusinessIdea;
use App\Models\BusRoute;
use App\Models\Doctor;
use App\Models\EducationalInstitute;
use App\Models\Ehelp;
use App\Models\Fireservice;
use App\Models\Food;
use App\Models\GovtOffice;
use App\Models\Helpline;
use App\Models\Hospital;
use App\Models\Hotel;
use App\Models\Job;
use App\Models\Journalist;
use App\Models\Lawyer;
use App\Models\Library;
use App\Models\Namaz;
use App\Models\Newspaper;
use App\Models\NewspaperCategory;
use App\Models\PalliBidyut;
use App\Models\PlaneTicket;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Story;
use App\Models\Thana;
use App\Models\TouristPlace;
use App\Models\Train;
use App\Models\TrainingCenter;
use App\Models\TrainRoute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // login
    // login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'Invalid credentials'
                    ],
                ]
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken,
        ]);
    }
          
          
    //get newspaper list
    public function newspaper()
    {
        $newspapers = NewspaperCategory::with('newspapers')->get();

        if ($newspapers->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $newspapers
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }
    
    // get number of newspapers
    public function countNewspaper()
    {
        $newspapers = Newspaper::count();
        return response()->json([
            'status' => 200,
            'data' => $newspapers
        ], 200);
    }


    // blood donor list
    public function bloodDonor()
    {
        $donors = BloodDonor::with('bloodGroup', 'city', 'district')->get();

        if ($donors->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $donors
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    //hospital list
    public function hospital()
    {
        $hospitals = Hospital::with('category', 'city', 'district')->get();

        if ($hospitals->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $hospitals
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    //ambulance list
    public function ambulance()
    {
        $ambulances = Ambulance::with('city', 'district')->get();

        if ($ambulances->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $ambulances
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    //doctor list
    public function doctor()
    {
        $doctors = Doctor::with('type', 'city', 'district')->get();

        if ($doctors->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $doctors
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // doctor by id
    public function singleDoctor($id)
    {
        $doctor = Doctor::with('type', 'city', 'district', 'chambers.hospital', 'chambers.hospital.category', 'chambers.hospital.city', 'chambers.hospital.district')->find($id);

        if ($doctor) {
            return response()->json([
                'status' => 200,
                'data' => $doctor
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // bus routes
    public function busRoutes()
    {
        $busroutes = BusRoute::all();

        if ($busroutes->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $busroutes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // bus routes by id
    public function busRoutesById($id)
    {
        $busroute = BusRoute::with('buses')->find($id);

        if ($busroute) {
            return response()->json([
                'status' => 200,
                'data' => $busroute
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // bus list
    public function buses()
    {
        $buses = Bus::all();

        if ($buses->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $buses
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }



    // train routes
    public function trainRoutes()
    {
        $trainroutes = TrainRoute::all();

        if ($trainroutes->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $trainroutes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // trains
    public function trains()
    {
        $trains = Train::all();

        if ($trains->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $trains
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // foods
    public function foods()
    {
        $foods = Food::with('restaurants')->get();

        if ($foods->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $foods
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // restaurants
    public function restaurants()
    {
        $restaurants = Restaurant::with('foods')->paginate(15);

        if ($restaurants->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Data get successfully',
                'data' => $restaurants
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // plane tickets
    public function planeTickets()
    {
        $planetickets = PlaneTicket::paginate(15);

        if ($planetickets->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $planetickets
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // police station
    public function policeStation()
    {
        $stations = Thana::with('category', 'district')->paginate(16);

        if ($stations->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $stations
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // police
    public function police($id)
    {
        $station = Thana::with('polices', 'district')->find($id);

        if ($station) {
            return response()->json([
                'status' => 200,
                'data' => $station
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }



    // police
    public function journalists()
    {
        $journalists = Journalist::with('category', 'city', 'district')->paginate(16);

        if ($journalists->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $journalists
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // lawyers
    public function lawyers()
    {
        $lawyers = Lawyer::with('department', 'city', 'district')->paginate(16);

        if ($lawyers->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $lawyers
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // fire service
    public function fireservices()
    {
        $fireservices = Fireservice::with('city', 'district')->paginate(16);

        if ($fireservices->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $fireservices
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // electricity
    public function electricity()
    {
        $electricity = PalliBidyut::with('city', 'district')->paginate(16);

        if ($electricity->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $electricity
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // hotels
    public function hotels()
    {
        $hotels = Hotel::with('city', 'district')->paginate(16);

        if ($hotels->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $hotels
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // ehelp
    public function ehelp()
    {
        $ehelp = Ehelp::paginate(16);

        if ($ehelp->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $ehelp
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // trainingcenters
    public function trainingcenters()
    {
        $trainingcenters = TrainingCenter::with('city', 'district')->paginate(16);

        if ($trainingcenters->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $trainingcenters
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // govtoffices
    public function govtoffices()
    {
        $govtoffices = GovtOffice::with('city', 'district')->paginate(16);

        if ($govtoffices->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $govtoffices
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // jobs
    public function jobs()
    {
        $jobs = Job::paginate(16);

        if ($jobs->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $jobs
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // helplines
    public function helplines()
    {
        $helplines = Helpline::paginate(16);

        if ($helplines->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $helplines
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }



    // govtoffices
    public function educationalInstitutes()
    {
        $educationalInstitutes = EducationalInstitute::with('category', 'city', 'district')->paginate(16);

        if ($educationalInstitutes->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $educationalInstitutes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // libraries
    public function libraries()
    {
        $libraries = Library::with('city', 'district')->paginate(16);

        if ($libraries->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $libraries
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // business ideas
    public function businessIdeas()
    {
        $ideas = BusinessIdea::with('businessType')->paginate(16);

        if ($ideas->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $ideas
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // business ideas by id
    public function businessIdeaById($id)
    {
        $idea = BusinessIdea::with('businessType')->find($id);

        if ($idea) {
            return response()->json([
                'status' => 200,
                'data' => $idea
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // tourist places
    public function touristPlaces()
    {
        $places = TouristPlace::with('placeType', 'district')->paginate(16);

        if ($places->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $places
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // shop category
    public function shopCategory()
    {
        $categories = ShopCategory::with('shops')->paginate(16);

        if ($categories->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $categories
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // shops
    public function shops()
    {
        $shops = Shop::with('shopCategory', 'city', 'district')->paginate(16);

        if ($shops->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $shops
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // stories
    public function stories()
    {
        $stories = Story::with('storyCategory')->paginate(16);

        if ($stories->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $stories
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // story by id
    public function storyById($id)
    {
        $story = Story::with('storyCategory')->find($id);

        if ($story) {
            return response()->json([
                'status' => 200,
                'data' => $story
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }

    // blogs
    public function blogs()
    {
        $blogs = Blog::with('blogCategory')->paginate(16);

        if ($blogs->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $blogs
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // blog by id
    public function blogById($id)
    {
        $blog = Blog::with('blogCategory')->find($id);

        if ($blog) {
            return response()->json([
                'status' => 200,
                'data' => $blog
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }


    // namaz
    public function namaz()
    {
        $namaz = Namaz::whereDate('date', Carbon::now())->first();

        if ($namaz) {
            return response()->json([
                'status' => 200,
                'data' => $namaz
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'No Records Found'
            ], 404);
        }
    }
}
