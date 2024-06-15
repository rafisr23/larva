<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="/" class="main-logo flex items-center shrink-0">
                    <img class="w-8 ml-[5px] flex-none" src="{{ asset('images/larva-logo.png') }}" alt="image" />
                    <span
                        class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline dark:text-white-light">LARVA</span>
                </a>
                <a href="javascript:;"
                    class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0"
                x-data="{ activeDropdown: null }">
                <li class="menu nav-item my-2">
                    <a href="{{ route('admin.dashboard.index') }}" class="group @if (request()->routeIs('admin.dashboard.index')) active @endif">
                        <div class="flex items-center">
                            <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.dashboard.index')) !text-red @endif" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    fill="currentColor" />
                                <path
                                    d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                    fill="currentColor" />
                            </svg>

                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                    </a>
                </li>

                @role('superadmin')
                    <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                        <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Database</span>
                    </h2>

                    <li class="nav-item">
                        <ul>
                            <li class="nav-item my-2">
                                <a href="{{ route('admin.image-category.index') }}" class="group @if (request()->routeIs('admin.image-category.*')) active @endif">
                                    <div class="flex items-center">
                                        <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.image-category.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 6v12a4 4 0 0 1-4 4H6"/>
                                                <path fill="currentColor" fill-rule="evenodd" d="M1 3.7A2.7 2.7 0 0 1 3.7 1h12.6A2.7 2.7 0 0 1 19 3.7v5.85c0 .078-.01.153-.028.225A.897.897 0 0 1 19 10v6.3a2.7 2.7 0 0 1-2.7 2.7H3.7A2.7 2.7 0 0 1 1 16.3v-2.7a.9.9 0 0 1 .028-.225A.902.902 0 0 1 1 13.15zm2.695 8.848a13.81 13.81 0 0 0-.895.04V3.7a.9.9 0 0 1 .9-.9h12.6a.9.9 0 0 1 .9.9v5.414c-3.868.125-6.66 1.057-8.623 2.36c.745.265 1.575.64 2.391 1.131c1.26.756 2.54 1.819 3.4 3.225a.9.9 0 1 1-1.535.94c-.663-1.083-1.69-1.96-2.792-2.622c-1.1-.66-2.218-1.073-2.994-1.253a13.924 13.924 0 0 0-3.333-.348h-.02zM5.48 5.04a2.403 2.403 0 0 1 1.37-.44c.369 0 .903.103 1.37.44c.513.369.88.977.88 1.81c0 .833-.367 1.441-.88 1.81a2.403 2.403 0 0 1-1.37.44c-.369 0-.903-.103-1.37-.44c-.513-.369-.88-.977-.88-1.81c0-.833.367-1.441.88-1.81" clip-rule="evenodd"/>
                                            </g>
                                        </svg>
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Image Category</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole
                

                <h2
                    class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Content</span>
                </h2>

                <li class="nav-item">
                    <ul>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.service.index') }}" class="group @if (request()->routeIs('admin.service.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.service.*')) !text-red @endif" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                            <path fill="currentColor" d="M9 13a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2zm10 0a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2zM9 3a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm10 0a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/>
                                        </g>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Service</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.project.index') }}" class="group @if (request()->routeIs('admin.project.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.project.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                                        <path fill="currentColor" fill-rule="evenodd" d="M3.5 4a2 2 0 1 0 0-4a2 2 0 0 0 0 4m2.045 6v-.03c0-.99.547-1.852 1.355-2.302A3.5 3.5 0 0 0 0 8.5v1a.5.5 0 0 0 .5.5h1l.445 3.562a.5.5 0 0 0 .496.438H4.56a.5.5 0 0 0 .496-.438L5.5 10zm4.382-2.313a.25.25 0 0 0-.25.25v.651h1.413v-.65a.25.25 0 0 0-.25-.25zm-1.75.25v.651c-.763 0-1.382.62-1.382 1.383v2.647c0 .763.619 1.382 1.382 1.382h4.412c.763 0 1.382-.619 1.382-1.382V9.97c0-.763-.618-1.382-1.381-1.382v-.65a1.75 1.75 0 0 0-1.75-1.75h-.913a1.75 1.75 0 0 0-1.75 1.75Z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Project</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.partner.index') }}" class="group @if (request()->routeIs('admin.partner.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.partner.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M11 6h3l3.29-3.3a1 1 0 0 1 1.42 0l2.58 2.59a1 1 0 0 1 0 1.41L19 9h-8v2a1 1 0 0 1-1 1a1 1 0 0 1-1-1V8a2 2 0 0 1 2-2m-6 5v4l-2.29 2.29a1 1 0 0 0 0 1.41l2.58 2.59a1 1 0 0 0 1.42 0L11 17h4a1 1 0 0 0 1-1v-1h1a1 1 0 0 0 1-1v-1h1a1 1 0 0 0 1-1v-1h-7v1a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V9Z"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Partner</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.contact.index') }}" class="group @if (request()->routeIs('admin.contact.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.contact.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M17.715 15.953A2.205 2.205 0 0 1 17.152 14h-10.9a2.249 2.249 0 0 0-2.248 2.249v.92c0 .572.178 1.13.51 1.596C6.056 20.929 8.58 22 12 22c.39 0 .767-.014 1.133-.042a2.252 2.252 0 0 1 .353-2.16l.8-1.01a2.195 2.195 0 0 1 2.238-.77l.838.203c.52-.437.83-.975.948-1.644zM12 2.005a5 5 0 1 1 0 10a5 5 0 0 1 0-10m6.192 11.99l.476-1.205c.242-.614.92-.933 1.548-.728l.431.141c.724.237 1.326.806 1.35 1.569c.1 3.11-2.476 7.583-5.213 9.055c-.673.362-1.468.123-2.035-.391l-.337-.305a1.253 1.253 0 0 1-.142-1.706l.8-1.01c.29-.367.767-.53 1.22-.42l1.292.313c1.103-.73 1.694-1.756 1.774-3.079l-.917-.964a1.203 1.203 0 0 1-.247-1.27"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Contact</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.page-image.index') }}" class="group @if (request()->routeIs('admin.page-image.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.page-image.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M4 2a2 2 0 0 0-2 2v1.337c.31-.148.647-.251 1-.302V4a1 1 0 0 1 1-1h3v.5A1.5 1.5 0 0 0 8.5 5H13v7a1 1 0 0 1-1 1h-1.035c-.05.353-.154.69-.302 1H12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm9 2H8.5a.5.5 0 0 1-.5-.5V3h4a1 1 0 0 1 1 1M1 8.5A2.5 2.5 0 0 1 3.5 6h4A2.5 2.5 0 0 1 10 8.5v4c0 .51-.152.983-.414 1.379L6.56 10.854a1.5 1.5 0 0 0-2.122 0l-3.025 3.025A2.488 2.488 0 0 1 1 12.5zm7 .25a.75.75 0 1 0-1.5 0a.75.75 0 0 0 1.5 0m-5.879 5.836c.396.262.87.414 1.379.414h4c.51 0 .983-.152 1.379-.414L5.854 11.56a.5.5 0 0 0-.708 0z"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Page Image</span>
                                </div>
                            </a>
                        </li>
                        {{-- <li class="nav-item mt-2">
                            <a href="{{ route('admin.blog.list') }}" class="group @if (request()->routeIs('admin.blog.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.blog.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M13 0a2 2 0 0 1 2 2H6a2 2 0 0 0-2 2v12a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                        <path fill="currentColor" d="M18 5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2zm-7 5H7V5h4zm5-4h-4V5h4zm0 2h-4V7h4zm0 2h-4V9h4zm0 2H7v-1h9zm0 2H7v-1h9zm0 2H7v-1h9z"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Blog</span>
                                </div>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item mt-2">
                            <a href="{{ route('admin.testimoni.index') }}" class="group @if (request()->routeIs('admin.testimoni.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.testimoni.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2M6 14v-2.47l6.88-6.88c.2-.2.51-.2.71 0l1.77 1.77c.2.2.2.51 0 .71L8.47 14zm12 0h-7.5l2-2H18z"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Testimoni</span>
                                </div>
                            </a>
                        </li> --}}
                        
                    </ul>
                </li>

                <h2
                    class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Blog</span>
                </h2>

                <li class="nav-item">
                    <ul>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.blog.list') }}" class="group @if (request()->routeIs('admin.blog.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.blog.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M13 0a2 2 0 0 1 2 2H6a2 2 0 0 0-2 2v12a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                                        <path fill="currentColor" d="M18 5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2zm-7 5H7V5h4zm5-4h-4V5h4zm0 2h-4V7h4zm0 2h-4V9h4zm0 2H7v-1h9zm0 2H7v-1h9zm0 2H7v-1h9z"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Blog</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.blog-category.index') }}" class="group @if (request()->routeIs('admin.blog-category.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.blog-category.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M17 3a4 4 0 1 0 0 8a4 4 0 0 0 0-8M3 17a4 4 0 1 1 8 0a4 4 0 0 1-8 0m10-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v5a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2zM3 4a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Blog Category</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.blog-tag.index') }}" class="group @if (request()->routeIs('admin.blog-tag.*')) active @endif">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-red shrink-0 @if (request()->routeIs('admin.blog-tag.*')) !text-red @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7m15.91 4.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.11 0-2 .89-2 2v7c0 .55.22 1.05.59 1.41l8.99 9c.37.36.87.59 1.42.59s1.05-.23 1.41-.59l7-7c.37-.36.59-.86.59-1.41c0-.56-.23-1.06-.59-1.42"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Blog Tag</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>
