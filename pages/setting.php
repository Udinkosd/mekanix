<?php include 'head.php'; ?>
<?php
include 'includes/connection.php';

session_start();

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $userEmail = $_SESSION['email'];

    $sql = "SELECT photo FROM personal_information WHERE username = (SELECT username FROM users WHERE id = $userId)";
    
    $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $profilePhoto = $row['photo'];
      
    } else {
        $profilePhoto = "/assets/img/default.jpg";
    }
  
} else {
    $profilePhoto = "/assets/img/default1.jpg";
}
?>
<form id="login">
                <div class="bg-white dark:bg-gray-800">
                    <div class="container mx-auto bg-white dark:bg-gray-800 rounded">
                        <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5 bg-white dark:bg-gray-800">
                            <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Profile</p>
                                <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg" alt="info">
                                    <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div class="xl:w-9/12 w-11/12 mx-auto xl:mx-0">
                                <div class="rounded relative mt-8 h-48">
                                    <img src="https://cdn.tuk.dev/assets/webapp/forms/form_layouts/form1.jpg" alt="" class="w-full h-full object-cover rounded absolute shadow" />
                                    <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded"></div>
                                    <div class="flex items-center px-3 py-2 rounded absolute right-0 mr-4 mt-4 cursor-pointer">
                                        <p class="text-xs text-gray-100">Change Cover Photo</p>
                                        <div class="ml-2 text-gray-100">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg1.svg" alt="Edit">
                                        </div>
                                    </div>
                                    <div class="w-20 h-20 rounded-full bg-cover bg-center bg-no-repeat absolute bottom-0 -mb-10 ml-12 shadow flex items-center justify-center">
                                        <img src="https://cdn.tuk.dev/assets/webapp/forms/form_layouts/form2.jpg" alt="" class="absolute z-0 h-full w-full object-cover rounded-full shadow top-0 left-0 bottom-0 right-0" />
                                        <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded-full z-0"></div>
                                        <div class="cursor-pointer flex flex-col justify-center items-center z-10 text-gray-100">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($profilePhoto); ?>" alt="Edit">
                                            <p class="text-xs text-gray-100">Edit Picture</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-16 flex flex-col xl:w-2/6 lg:w-1/2 md:w-1/2 w-full">
                                    <label for="username" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Username</label>
                                    <input tabindex="0" type="text" id="username" name="username" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 bg-transparent placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="@example" />
                                </div>
                                <div class="mt-8 flex flex-col xl:w-3/5 lg:w-1/2 md:w-1/2 w-full">
                                    <label for="about" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">About</label>
                                    <textarea id="about" name="about" required class="bg-transparent border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 resize-none placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="Let the world know who you are" rows="5"></textarea>
                                    <p class="w-full text-right text-xs pt-1 text-gray-600 dark:text-gray-400">Character Limit: 200</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mx-auto bg-white dark:bg-gray-800 mt-10 rounded px-4">
                        <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
                            <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Personal Information</p>
                                <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg" alt="info">
                                    <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto pt-4">
                            <div class="container mx-auto">
                                <form class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0">
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="FirstName" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">First Name</label>
                                        <input tabindex="0" type="text" id="FirstName" name="firstName" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="" />
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="LastName" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Last Name</label>
                                        <input tabindex="0" type="text" id="LastName" name="lastName" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="" />
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="Email" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Email</label>
                                        <div class="border border-green-400 shadow-sm rounded flex">
                                            <div tabindex="0" class="focus:outline-none px-4 py-3 dark:text-gray-100 flex items-center border-r border-green-400">
                                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg2.svg" alt="mail">
                                                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg2dark.svg" alt="mail">
                                            </div>
                                            <input tabindex="0" type="text" id="Email" name="email" required class="pl-3 py-3 w-full text-sm focus:outline-none placeholder-gray-500 rounded bg-transparent text-gray-600 dark:text-gray-400" placeholder="example@gmail.com" />
                                        </div>
                                        <div class="flex justify-between items-center pt-1 text-green-700">
                                            <p class="text-xs">Email submission success!</p>
                                           <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg3.svg" alt="success">
                                        </div>
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="StreetAddress" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Street Address</label>
                                        <input tabindex="0" type="text" id="StreetAddress" name="streetAddress" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded bg-transparent text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="" />
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="City" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">City</label>
                                        <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                            <input tabindex="0" type="text" id="City" name="city" required class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-indigo-700 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="Los Angeles" />
                                            <div class="px-4 flex items-center border-l border-gray-300 dark:border-gray-700 flex-col justify-center text-gray-600 dark:text-gray-400">
                                               <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg5.svg" alt="up">
                                               <img class="dark:hidden transform rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg5.svg" alt="down">
                                               <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg5dark.svg" alt="up">
                                               <img class="dark:block hidden transform rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg5dark.svg" alt="down">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="State/Province" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">State/Province</label>
                                        <input tabindex="0" type="text" id="State/Province" name="state" required class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="California" />
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <label for="Country" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Country</label>
                                        <input tabindex="0" type="text" id="Country" name="country" required class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="United States" />
                                    </div>
                                    <div class="xl:w-1/4 lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                        <div class="flex items-center pb-2">
                                            <label for="ZIP" class="text-sm font-bold text-gray-800 dark:text-gray-100">ZIP/Postal Code</label>
                                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg" alt="info">
                                                <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                                            </div>
                                        </div>
                                        <input tabindex="0" type="text" name="zip" required id="ZIP" class="bg-transparent border border-red-400 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 placeholder-gray-500 text-gray-600 dark:text-gray-400" placeholder="86745" />
                                        <div class="flex justify-between items-center pt-1 text-red-700">
                                            <p class="text-xs">Incorrect Zip Code</p>
                                           <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg6.svg" alt="cancel">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container mx-auto mt-10 rounded bg-gray-100 dark:bg-gray-700 w-11/12 xl:w-full">
                        <div class="xl:w-full py-5 px-8">
                            <div class="flex items-center mx-auto">
                                <div class="container mx-auto">
                                    <div class="mx-auto xl:w-full">
                                        <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Alerts</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 pt-1">Get updates of any new activity or features. Turn on/off your preferences</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mx-auto pb-6">
                            <div class="flex items-center pb-4 border-b border-gray-300 dark:border-gray-700 px-8 text-gray-800 dark:text-gray-100">
                               <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg7.svg" alt="mail">
                               <img class="dark:block hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg7dark.svg" alt="mail">
                                <p class="text-sm font-bold ml-2 text-gray-800 dark:text-gray-100">Via Email</p>
                            </div>
                            <div class="px-8">
                                <div class="flex justify-between items-center mb-8 mt-4">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Comments</p>
                                        <p id="cb1" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a post or comment is made</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input tabindex="0" aria-labelledby="cb1" type="checkbox" name="email_comments" id="toggle1" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Job Applications</p>
                                        <p id="cb2" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a candidate applies to a job posting</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input aria-labelledby="cb2" tabindex="0" type="checkbox" name="email_job_application" id="toggle2" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Product Updates</p>
                                        <p id="cb3" class="text-sm text-gray-600 dark:text-gray-400">Get notifitied when there is a new product feature or upgrades</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input aria-labelledby="cb3" tabindex="0" type="checkbox" name="email_product_update" id="toggle3" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 border-b border-gray-300 dark:border-gray-700 px-8">
                                <div class="flex items-center text-gray-800 dark:text-gray-100">
                                   <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg8.svg" alt="notification">
                                   <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg8dark.svg" alt="notification">
                                    <p class="text-sm font-bold ml-2 text-gray-800 dark:text-gray-100">Push Notifications</p>
                                </div>
                            </div>
                            <div class="px-8">
                                <div class="flex justify-between items-center mb-8 mt-4">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Comments</p>
                                        <p id="cb4" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a post or comment is made</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input aria-labelledby="cb4" tabindex="0" type="checkbox" name="notification_comment" id="toggle4" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Job Applications</p>
                                        <p id="cb5" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a candidate applies to a job posting</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input aria-labelledby="cb5" tabindex="0" type="checkbox" name="notification_application" id="toggle5" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Product Updates</p>
                                        <p id="cb6" class="text-sm text-gray-600 dark:text-gray-400">Get notifitied when there is a new product feature or upgrades</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                        <input aria-labelledby="cb6" tabindex="0" type="checkbox" name="notification_updates" id="toggle6" class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                        <label class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <<div class="container mx-auto w-11/12 xl:w-full">
                        <div class="w-full py-4 sm:px-0 bg-white dark:bg-gray-800 flex justify-end">
                            <a href="/pages/dashboard.php" aria-label="cancel form" class="bg-gray-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300 dark:bg-gray-700 rounded text-indigo-600 dark:text-indigo-600 px-6 py-2 text-xs mr-4 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">Cancel</a>
                            <button aria-label="Save form" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 bg-indigo-700 focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-8 py-2 text-sm" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <style>
                .checkbox:checked {
                    /* Apply class right-0*/
                    right: 0;
                }
                .checkbox:checked + .toggle-label {
                    /* Apply class bg-indigo-700 */
                    background-color: #4c51bf;
                }
            </style> 