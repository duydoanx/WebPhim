<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right">
                        <a class="collapse-link DS"
                        ><i class="fa fa-chevron-up"></i
                            ></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content DS">
                <div class="table-responsive">
                    <table
                            class="table table-striped jambo_table bulk_action"
                            id="table"
                    >
                        <thead>
                        <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Username</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Level</th>
                            <th class="column-title">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="even pointer">
                            <td class="">1</td>
                            <td width="10%">admin</td>
                            <td>admin@gmail.com</td>
                            <td>admin</td>
                            <td width="10%">
                                <select
                                        name="select_change_attr"
                                        class="form-control"
                                        data-url="/change-level-value_new/1">
                                    <option value="admin" selected="selected">Admin</option>
                                    <option value="member">Member</option>
                                </select>
                            </td>
                            <td class="">
                                <div class="zvn-box-btn-filter">
                                    <a
                                            href="/form/1"
                                            type="button"
                                            class="btn btn-icon btn-success"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a
                                            href="/delete/1"
                                            type="button"
                                            class="btn btn-icon btn-danger btn-delete"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td class="">2</td>
                            <td width="10%">member</td>
                            <td>member@gmail.com</td>
                            <td>member</td>
                            <td width="10%">
                                <select
                                        name="select_change_attr"
                                        class="form-control"
                                        data-url="/change-level-value_new/2">
                                    <option value="admin">Admin</option>
                                    <option value="member" selected="selected"
                                    >Member</option>
                                </select>
                            </td>
                            <td class="last">
                                <div class="zvn-box-btn-filter">
                                    <a
                                            href="/form/2"
                                            type="button"
                                            class="btn btn-icon btn-success"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a
                                            href="/delete/2"
                                            type="button"
                                            class="btn btn-icon btn-danger btn-delete"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>