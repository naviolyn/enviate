<aside class="hidden py-1 md:w-1/3 lg:w-3/12 md:block  h-full border-r ">
    <div class="sticky flex flex-col gap-2 p-4 text-sm ">
        <div class="flex pl-3 mb-4 text-2xl font-semibold text-darkGreen justify-start align-middle items-center gap-2"><i class="fa-solid fa-gear"></i>
            <h2 class="">Settings</h2></div>

            <a href="/edit-profile" class="flex items-center px-3 py-2.5 font-semibold {{ Request::is('edit-profile*') ? 'bg-lightGreen text-darkGreen border rounded-full font-bold' : '' }}">

            Edit Profile
        </a>
        <a href="/settings/password"
            class="flex items-center px-3 py-2.5 font-semibold {{ Request::is('change-password*') ? 'bg-lightGreen  text-darkGreen border rounded-full font-bold' : '' }}">
            Change Password
        </a>
    </div>
</aside>