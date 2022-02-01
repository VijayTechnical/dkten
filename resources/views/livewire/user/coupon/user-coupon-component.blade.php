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
                        <div class="row profile">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="information-title">
                                    Your Coupon History</div>
                                <div class="wallet">
                                    <table class="table" style="background: #fff;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Coupon</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result6">
                                            <tr>
                                                <td>1</td>
                                                <td>558063</td>
                                                <td>40</td>
                                                <td>2021-08-19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination_box">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>
</div>