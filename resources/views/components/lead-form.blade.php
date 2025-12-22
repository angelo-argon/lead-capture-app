<div class="relative z-10 w-full  rounded-2xl bg-white/5 backdrop-blur-xl border border-white/20 shadow-[0_0_60px_rgba(147,51,234,0.35)] p-8 text-white" >
            
    <h2 class="text-2xl font-semibold mb-6 text-center"> Request a Demo</h2>

            
    <form class="w-full space-y-5">
        <div class="w-full flex flex-row gap-4">
            <div class="w-1/2 flex flex-col gap-3">
                <div>  
                    <label class="block text-sm mb-1 text-white/70">Full Name</label>
                    <input type="name"class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" placeholder="Enter you full name here" />
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Email</label>   
                    <input type="email" class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" placeholder="you@example.com"/>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Company/Organization</label>
                    <input type="name"class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" placeholder="ABC Enterpises"/>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Contact Number</label>
                    <div class="flex items-center">
                    <span class="px-3 py-2 bg-white/10 border border-white/20 rounded-l-lg text-white">+63</span>
                    <input
                        type="tel"
                        class="flex-1 rounded-r-lg bg-transparent border border-white/20 border-l-0 px-4 py-2 text-white placeholder-white/40 focus:border-purple-400"
                        placeholder="912 345 6789"
                        required
                    />
                    </div>
                </div>
            </div>

            <div class="w-1/2 flex flex-col gap-3">
                <div>
                    <label class="block text-sm mb-1 text-white/70">Project Type</label>
                    <select
                        class="w-full h-[2.5em] rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white focus:outline-none focus:border-purple-400 appearance-none">
                        <option value="" disabled selected>Select Project Type</option>
                        <option value="web-development">Web Development</option>
                        <option value="web-app">Web Application / SaaS</option>
                        <option value="ui-ux">UI/UX / Design</option>
                        <option value=">mobile-app">Mobile App Development</option>
                        <option value=">e-commerce">E-commerce / Online Store</option>
                        <option value="consultation">Consultation / Advisory</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Estimated Timeline</label>
                    <input type="date"class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400"/>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Budget Range</label>
                    <select
                        class="w-full h-[2.5em] rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white focus:outline-none focus:border-purple-400 appearance-none">
         focus:outline-none focus:border-purple-400">
                        <option value="" disabled selected>Select your budget</option>
                        <option value="<1000">Less than $1,000</option>
                        <option value="1000-5000">$1,000 – $5,000</option>
                        <option value="5000-10000">$5,000 – $10,000</option>
                        <option value=">10000">More than $10,000</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Role/Job Title</label>
                    <input type="text"class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400"/>
                </div>
            </div>

            </div>
            <div class="flex flex-col mt-4">
                <label class="inline-flex items-center text-white/80">
                    <input type="checkbox" required class="form-checkbox h-5 w-5 text-purple-600 border-white/40 rounded mr-2">
                    I agree to be contacted regarding my inquiry and accept the Privacy Policy.
                </label>

                <p class="text-sm text-white/50 mt-2">
                    No spam. We’ll only contact you about your request. Response within 24 hours.
                </p>
            </div>
            <button
                class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-60 hover:from-purple-500 hover:to-indigo-500 transition-all duration-300 shadow-[0_0_40px_rgba(147,51,234,0.6)]"> Submit</button>
            </form>
        </div>