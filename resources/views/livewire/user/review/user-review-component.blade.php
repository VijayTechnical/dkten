@push('styles')
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
<div>
    <section class="page-section">
        <div class="wrap container">
            <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>

                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div id="window">
                            <div id="all_messages_box">
                                <hr class="page-divider">
                                <div class="comments-form tickets">
                                    <h4 class="block-title">
                                        Reply Message </h4>
                                    <form action="#" wire:submit.prevent="addReview()" class="form-horizontal"
                                        accept-charset="utf-8">
                                        <div class="form-check author_rating">
                                            <div class="flex space-x-1 rating">
                                                <label for="star1">
                                                    <input hidden wire:model="rating" type="radio" id="star1"
                                                        name="rating" value="5" />
                                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5) text-indigo-500 @else text-grey @endif"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </label>
                                                <label for="star2">
                                                    <input hidden wire:model="rating" type="radio" id="star2"
                                                        name="rating" value="4" />
                                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4) text-indigo-500 @else text-grey @endif"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </label>
                                                <label for="star3">
                                                    <input hidden wire:model="rating" type="radio" id="star3"
                                                        name="rating" value="3" />
                                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3) text-indigo-500 @else text-grey @endif"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </label>
                                                <label for="star4">
                                                    <input hidden wire:model="rating" type="radio" id="star4"
                                                        name="rating" value="2" />
                                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2) text-indigo-500 @else text-grey @endif"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </label>
                                                <label for="star5">
                                                    <input hidden wire:model="rating" type="radio" id="star5"
                                                        name="rating" value="1" />
                                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1) text-indigo-500 @else text-grey @endif"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </label>
                                            </div>
                                            @error('rating')
                                            <span role="alert" class="text-danger mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Your Comment" class="form-control" name="reply"
                                                rows="3" wire:model="comment"></textarea>
                                            @error('comment')
                                            <span role="alert" class="text-danger mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="submit"
                                                class="btn  btn-theme-transparent btn-icon-left submit_button enterer">
                                                <i class="fa fa-comment"></i>
                                                Reply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <style>
                                .comment-text {
                                    cursor: pointer;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
    </section>
</div>