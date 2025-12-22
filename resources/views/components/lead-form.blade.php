<div class="relative z-10 w-full rounded-2xl bg-white/5 backdrop-blur-xl border border-white/20 shadow-[0_0_60px_rgba(147,51,234,0.35)] p-8 text-white">
    
    <h2 class="text-2xl font-semibold mb-6 text-center">Request a Demo</h2>

    <!-- Success/Error Message -->
    <div id="formMessage" class="hidden mb-4 p-4 rounded-lg"></div>
    
    <form id="demoRequestForm" class="w-full space-y-5">
        @csrf
        
        <div class="w-full flex flex-row gap-4">
            <div class="w-1/2 flex flex-col gap-3">
                <div>  
                    <label class="block text-sm mb-1 text-white/70">Full Name</label>
                    <input 
                        type="text" 
                        name="full_name"
                        required
                        class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" 
                        placeholder="Enter your full name here" 
                    />
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Email</label>   
                    <input 
                        type="email" 
                        name="email"
                        required
                        class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" 
                        placeholder="you@example.com"
                    />
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Company/Organization</label>
                    <input 
                        type="text" 
                        name="company"
                        required
                        class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400" 
                        placeholder="ABC Enterprises"
                    />
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Contact Number</label>
                    <div class="flex items-center">
                        <span class="px-3 py-2 bg-white/10 border border-white/20 rounded-l-lg text-white">+63</span>
                        <input
                            type="tel"
                            name="contact_number"
                            required
                            class="flex-1 rounded-r-lg bg-transparent border border-white/20 border-l-0 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400"
                            placeholder="912 345 6789"
                        />
                    </div>
                </div>
            </div>

            <div class="w-1/2 flex flex-col gap-3">
                <div>
                    <label class="block text-sm mb-1 text-white/70">Project Type</label>
                    <select
                        name="project_type"
                        required
                        class="w-full h-[2.5em] rounded-lg bg-gray-800 border border-white/20 px-4 py-2 text-white focus:outline-none focus:border-purple-400 appearance-none">
                        <option value="" disabled selected>Select Project Type</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Web Application / SaaS">Web Application / SaaS</option>
                        <option value="UI/UX / Design">UI/UX / Design</option>
                        <option value="Mobile App Development">Mobile App Development</option>
                        <option value="E-commerce / Online Store">E-commerce / Online Store</option>
                        <option value="Consultation / Advisory">Consultation / Advisory</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Estimated Timeline</label>
                    <input 
                        type="date" 
                        name="timeline"
                        class="w-full rounded-lg bg-gray-800 border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400 [color-scheme:dark]"
                    />
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Budget Range</label>
                    <select
                        name="budget_range"
                        required
                        class="w-full h-[2.5em] rounded-lg bg-gray-800 border border-white/20 px-4 py-2 text-white focus:outline-none focus:border-purple-400 appearance-none">
                        <option value="" disabled selected>Select your budget</option>
                        <option value="Less than $1,000">Less than $1,000</option>
                        <option value="$1,000 – $5,000">$1,000 – $5,000</option>
                        <option value="$5,000 – $10,000">$5,000 – $10,000</option>
                        <option value="More than $10,000">More than $10,000</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-white/70">Role/Job Title</label>
                    <input 
                        type="text" 
                        name="job_title"
                        class="w-full rounded-lg bg-transparent border border-white/20 px-4 py-2 text-white placeholder-white/40 focus:outline-none focus:border-purple-400"
                        placeholder="e.g., CEO, Marketing Manager"
                    />
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-4">
            <label class="inline-flex items-center text-white/80">
                <input 
                    type="checkbox" 
                    name="agree_terms"
                    required 
                    class="form-checkbox h-5 w-5 text-purple-600 border-white/40 rounded mr-2"
                >
                I agree to be contacted regarding my inquiry and accept the Privacy Policy.
            </label>

            <p class="text-sm text-white/50 mt-2">
                No spam. We'll only contact you about your request. Response within 24 hours.
            </p>
        </div>

        <button
            type="submit"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 transition-all duration-300 shadow-[0_0_40px_rgba(147,51,234,0.6)]">
            Submit Request
        </button>
    </form>
</div>

<script>
document.getElementById('demoRequestForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const button = form.querySelector('button[type="submit"]');
    const messageDiv = document.getElementById('formMessage');
    
    // Disable button and show loading
    button.disabled = true;
    button.textContent = 'Submitting...';
    messageDiv.classList.add('hidden');
    
    try {
        const response = await fetch('/demo/submit', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success message
            messageDiv.className = 'mb-4 p-4 rounded-lg bg-green-500/20 border border-green-500/50 text-green-100';
            messageDiv.textContent = data.message;
            messageDiv.classList.remove('hidden');
            
            // Reset form
            form.reset();
            
            // Scroll to message
            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            // Show error message
            messageDiv.className = 'mb-4 p-4 rounded-lg bg-red-500/20 border border-red-500/50 text-red-100';
            messageDiv.textContent = data.message || 'An error occurred. Please try again.';
            messageDiv.classList.remove('hidden');
        }
    } catch (error) {
        // Show error message
        messageDiv.className = 'mb-4 p-4 rounded-lg bg-red-500/20 border border-red-500/50 text-red-100';
        messageDiv.textContent = 'Network error. Please check your connection and try again.';
        messageDiv.classList.remove('hidden');
    } finally {
        // Re-enable button
        button.disabled = false;
        button.textContent = 'Submit Request';
    }
});
</script>