
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                
                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <?php if(check_page_permission('admin_manage')): ?>
                        <div class="col-md-3 mt-5 mb-3">
                            <div class="card text-dark mb-3">
                                <div class="dsh-box-style">
                                    <a href="#" class="add-new"><i class="ti-plus"></i></a>
                                    <div class="icon">
                                        <i class="ti-user"></i>
                                    </div>
                                    <div class="content">
                                        <span class="total"><?php echo e($total_users); ?></span>
                                        <h4 class="title"><?php echo e(__('Total Users')); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(check_page_permission_by_string('Blogs Manage')): ?>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card text-dark  mb-3">
                                <div class="dsh-box-style">
                                    <a href="#" class="add-new"><i class="ti-plus"></i></a>
                                    <div class="icon">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                    </div>
                                    <div class="content">
                                        <span class="total"><?php echo e($total_member); ?></span>
                                        <h4 class="title"><?php echo e(__('Members Register')); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(check_page_permission_by_string('Job Post Manage') && !empty(get_static_option('job_module_status'))): ?>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card text-dark  mb-3">
                                <div class="dsh-box-style">
                                    <a href="#" class="add-new"><i class="ti-plus"></i></a>
                                    <div class="icon">
                                        <i class="fa fa-industry fa-regular"></i>
                                    </div>
                                    <div class="content">
                                        <span class="total"><?php echo e($total_business); ?></span>
                                        <h4 class="title"><?php echo e(__('Total Business')); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    
                    
                    <!--<?php if(check_page_permission_by_string('Services')): ?>-->
                    <!--    <div class="col-md-3 mt-md-5 mb-3">-->
                    <!--        <div class="card text-dark  mb-3">-->
                    <!--            <div class="dsh-box-style">-->
                    <!--                <a href="<?php echo e(route('admin.services.new')); ?>" class="add-new"><i class="ti-plus"></i></a>-->
                    <!--                <div class="icon">-->
                    <!--                    <i class="ti-blackboard"></i>-->
                    <!--                </div>-->
                    <!--                <div class="content">-->
                    <!--                    <span class="total"><?php echo e($total_services); ?></span>-->
                    <!--                    <h4 class="title"><?php echo e(__('Total Services')); ?></h4>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--<?php endif; ?>-->
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card margin-top-40">
                    <div class="smart-card">
                        
                        <h4 class="title"><?php echo e(__('All Members')); ?></h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th><?php echo e(__('#')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Committee')); ?></th>
                                    <th><?php echo e(__('Member Category')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                    <th><?php echo e(__('Change Status to')); ?></th>
                                </thead>
                                <tbody>
                                    <?php
                                        $startNumber = ($membersData->currentPage() - 1) * $membersData->perPage() + 1;
                                    ?>
                                    <?php $__currentLoopData = $membersData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($startNumber++); ?></td>
                                            <td><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></td>
                                            <td><?php echo e($data->email); ?></td>
                                            <td>
                                                <?php
                                                $committees = json_decode($data->committee);
                                            ?>
                                            <?php if($committees): ?>
                                                <?php $__currentLoopData = $committees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $committee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($committee); ?>

                                                    <?php if(!$loop->last): ?>
                                                        
                                                        ,
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </td>
                                            <td><?php echo e($data->member_category); ?></td>
                                            <td>

                                                <?php if($data->status == 'approved'): ?>
                                                    <span class="badge badge-success"><?php echo e(__('Approved')); ?></span>
                                                <?php elseif($data->status == 'pending'): ?>
                                                    <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#member_edit_modal"
                                                    class="btn btn-xs btn-primary btn-sm mb-3 mr-1 member_edit_btn"
                                                    data-user-id="<?php echo e($data->id); ?>"
                                                    data-username="<?php echo e($data->username); ?>"
                                                    data-first-name="<?php echo e($data->first_name); ?>"
                                                    data-last-name="<?php echo e($data->last_name); ?>"
                                                    data-email="<?php echo e($data->email); ?>" data-phone="<?php echo e($data->phone); ?>"
                                                    data-whatsapp="<?php echo e($data->whatsapp); ?>" data-state="<?php echo e($data->state); ?>"
                                                    data-city="<?php echo e($data->city); ?>" data-zipcode="<?php echo e($data->zipcode); ?>"
                                                    data-country="<?php echo e($data->country); ?>" data-about="<?php echo e($data->about); ?>"
                                                    data-address="<?php echo e($data->address); ?>"
                                                    data-member_category="<?php echo e($data->member_category); ?>"
                                                    data-committee="<?php echo e($data->committee); ?>"
                                                    data-blood_group="<?php echo e($data->blood_group); ?>"
                                                    data-highlight="<?php echo e($data->highlight); ?>">
                                                     Edit and Approve
                                                </a>

                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => route('admin.member_delete', $data->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.member_delete', $data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                
                                                <?php if(check_page_permission_by_string('Manage Members Password')): ?>
                                                    <a href="#" data-id="<?php echo e($data->id); ?>"
                                                        data-whatsapp="<?php echo e($data->whatsapp); ?>"
                                                        data-username="<?php echo e($data->username); ?>" data-toggle="modal"
                                                        data-target="#user_change_password_modal"
                                                        class="btn btn-xs btn-info btn-sm mb-3 mr-1 user_change_password_btn">
                                                        <?php echo e(__('Change Password')); ?>

                                                    </a>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <?php if($data->status == 'pending'): ?>
                                                    <form action="<?php echo e(route('admin.member_status')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" id="id"
                                                            value="<?php echo e($data->id); ?>">
                                                        <input type="hidden" name="status" id="status"
                                                            value="<?php echo e('approved'); ?>">
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                <?php else: ?>
                                                    <form action="<?php echo e(route('admin.member_status')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" id="id"
                                                            value="<?php echo e($data->id); ?>">
                                                        <input type="hidden" name="status" id="status"
                                                            value="<?php echo e('pending'); ?>">
                                                        <button type="submit"
                                                            class="btn btn-warning btn-sm">Pending</button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo e($membersData->links()); ?>

                    </div>
                </div>
            </div>

            <div class="modal fade " id="member_edit_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo e(__('Member Details Edit')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        </div>
                        <form action="<?php echo e(route('admin.member.update')); ?>" id="user_edit_modal_form" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <input type="hidden" name="user_id" id="user_id">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control item" id="first_name"
                                                name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control item" id="last_name"
                                                name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control item" id="email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control item" id="phone"
                                                name="phone">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="whatsapp">whatsapp No</label>
                                            <input type="text" class="form-control item" id="whatsapp"
                                                name="whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="blood_group">Blood Group</label>
                                            <input type="text" class="form-control item" id="blood_group"
                                                name="blood_group">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="member_category">Member Category</label>
                                            <select name="member_category" id="member_category" class="form-control">
                                                <option value="" disabled selected></option>
                                                <option value="Chairperson">Chairperson</option>
                                                <option value="President">President</option>
                                                <option value="Vice President">Vice President</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Joint Secretary">Joint Secretary</option>
                                                <option value="Asst. Secretary">Asst. Secretary</option>
                                                <option value="Treasurer">Treasurer</option>
                                                <option value="General Member">General Member</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Special Member">Special Member</option>
                                                <option value="Honorary Member">Honorary Member</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="committee">Committee (Select multiple)</label>
                                            <select name="committee[]" id="committee" class="form-control" multiple
                                                >
                                                <option value="ADMIN COMMITTEE">ADMIN COMMITTEE</option>
                                                <option value="ADVISORY COMMITTEE">ADVISORY COMMITTEE</option>
                                                <option value="BUSINESS COMMITTEE">BUSINESS COMMITTEE</option>
                                                <option value="BUSINESS DEVELOPMENT COMMITTEE">BUSINESS DEVELOPMENT COMMITTEE</option>
                                                <option value="CORE COMMITTEE">CORE COMMITTEE</option>
                                                <option value="CULTURAL COMMITTEE">CULTURAL COMMITTEE</option>
                                                <option value="DISCIPLINARY COMMITTEE">DISCIPLINARY COMMITTEE</option>
                                                <option value="EVENT MGMT. COMMITTEE">EVENT MGMT. COMMITTEE</option>
                                                <option value="FINANCE COMMITTEE">FINANCE COMMITTEE</option>
                                                <option value="GOVERNING BODY">GOVERNING BODY</option>
                                                <option value="LEGAL ADVISORY COMMITTEE">LEGAL ADVISORY COMMITTEE</option>
                                                <option value="ORGANIZING COMMITTEE">ORGANIZING COMMITTEE</option>
                                                <option value="PR & PUBLICITY COMMITTEE">PR & PUBLICITY COMMITTEE</option>
                                                <option value="SELECTION COMMITTEE">SELECTION COMMITTEE</option>
                                                <option value="SOCIAL ACTIVIST COMMITTEE">SOCIAL ACTIVIST COMMITTEE</option>
                                                <option value="SOCIAL COMMITTEE">SOCIAL COMMITTEE</option>
                                                <option value="SOCIO-CULTURAL COMMITTEE">SOCIO-CULTURAL COMMITTEE</option>
                                                <option value="STARTUP & S.B.D.C">STARTUP & S.B.D.C</option>
                                                <option value="STREERING COMMITTEE">STREERING COMMITTEE</option>
                                                <option value="TECHNICAL COMMITTEE">TECHNICAL COMMITTEE</option>
                                                <option value="VOLUNTEER COMMITTEE">VOLUNTEER COMMITTEE</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address"><?php echo e(__('Address')); ?></label>
                                            <textarea class="form-control item" id="address" name="address"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="state"><?php echo e(__('State')); ?></label>
                                            <input type="text" class="form-control item" id="state"
                                                name="state">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city"><?php echo e(__('City')); ?></label>
                                            <input type="text" class="form-control item" id="city"
                                                name="city">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="zipcode"><?php echo e(__('Zipcode')); ?></label>
                                            <input type="text" class="form-control item" id="zipcode"
                                                name="zipcode">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country"><?php echo e(__('Country')); ?></label>
                                            <select id="country" class="form-control item" name="country">
                                                <option value="India">India</option>
                                                <option value="Afganistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire">Bonaire</option>
                                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Island">Cocos Island</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote DIvoire">Cote DIvoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaco">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Ter">French Southern Ter</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea Sout">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Nambia">Nambia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau Island">Palau Island</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Phillipines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Maarten">St Maarten</option>
                                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uraguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="highlight">Highlight</label>
                                            <input type="text" class="form-control item" id="highlight"
                                                name="highlight">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="about"><?php echo e(__('About')); ?></label>
                                            <textarea class="form-control item" id="about" maxlength="300" name="about"></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        <div class="modal fade" id="user_change_password_modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo e(__('Change Password')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        </div>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.member.change-password')); ?>" id="user_password_change_modal_form"
                            method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <input type="hidden" name="ch_user_id" id="ch_user_id">
                                <input type="hidden" id="whatsapp_number" name="whatsapp_number">
                                <div class="form-group">
                                    <label for="password"><?php echo e(__('Username')); ?></label>
                                    <input type="text" class="form-control" name="username" id="model_username">
                                </div>
                                <div class="form-group">
                                    <label for="password"><?php echo e(__('Password')); ?></label>
                                    <input type="text" class="form-control" name="password" id="model_password"
                                        placeholder="<?php echo e(__('Enter Password')); ?>">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="generatePassword()"><?php echo e(__('Generate Password')); ?></button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="sendPasswordViaWhatsApp()"><?php echo e(__('Send Password via WhatsApp')); ?></button>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 when the modal is shown
            $('#member_edit_modal').on('shown.bs.modal', function() {
                $("#committee").select2({
                    tags: "true",
                    allowClear: true,
                })
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            
            $(document).on('click', '.user_change_password_btn', function(e) {
                e.preventDefault();
                var el = $(this);
                var form = $('#user_password_change_modal_form');
                form.find('#ch_user_id').val(el.data('id'));
                form.find('#model_username').val(el.data('username'));
                form.find('#whatsapp_number').val(el.data('whatsapp'));
            });


            $(document).on('click', '.member_edit_btn', function(e) {
                // alert('hi')
                e.preventDefault();
                var form = $('#user_edit_modal_form');
                var el = $(this);

                form.find('#user_id').val(el.data('user-id'));
                form.find('#first_name').val(el.data('first-name'));
                form.find('#last_name').val(el.data('last-name'));
                form.find('#username').val(el.data('username'));
                form.find('#email').val(el.data('email'));
                form.find('#phone').val(el.data('phone'));
                form.find('#whatsapp').val(el.data('whatsapp'));
                form.find('#state').val(el.data('state'));
                form.find('#city').val(el.data('city'));
                form.find('#zipcode').val(el.data('zipcode'));
                form.find('#country').val(el.data('country'));
                form.find('#member_category').val(el.data('member_category'));
                form.find('#address').val(el.data('address'));
                form.find('#blood_group').val(el.data('blood_group'));
                form.find('#highlight').val(el.data('highlight'));
                form.find('#about').val(el.data('about'));
                form.find('#country option[value="' + el.data('country') + '"]').attr('selected', true);
                
                 var committeeValues = el.data('committee');

                // Select the <select> element with the name attribute
                var committeeSelect = $('select[name="committee[]"]');

                // Set the selected values using Select2's `val` method
                committeeSelect.val(committeeValues);

                // Trigger the change event to update the Select2 widget
                committeeSelect.trigger('change');

            });

        });
    </script>
    
     <script>
        function generatePassword() {
            // Generate a random password (you can customize the logic)
            const length = 10;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }

            // Fill the password input field with the generated password
            document.getElementById("model_password").value = password;
        }

        function sendPasswordViaWhatsApp() {
            // Get the generated password
            const generatedPassword = document.getElementById("model_password").value;
            const whatsappNumber = document.getElementById('whatsapp_number').value;
            const userName = document.getElementById('model_username').value;

            // Check if a password has been generated
            if (generatedPassword) {
                // You can implement the logic to send the password via WhatsApp here
                // For example, you can open a WhatsApp link with a predefined message:
                const whatsappMessage =
                `Hello! your username is ${userName} and Your new password is: ${generatedPassword}`;
                const whatsappLink = `https://wa.me/${whatsappNumber}/?text=${encodeURIComponent(whatsappMessage)}`;
                window.open(whatsappLink, "_blank");
            } else {
                alert("Please generate a password first.");
            }
        }
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u235913067/domains/fbsc.in/public_html/resources/views/backend/admin-home.blade.php ENDPATH**/ ?>