window,define(["jquery","session","bootstrap"],function(d,l){l.onInit(function(){var t=new Date("2017-02-28").getTime(),e=new Date("2017-06-30").getTime(),a=(new Date).getTime(),o=l.getUserInfo().account_number,n="rhnmodal",i=localStorage.getItem(n),s='<div class="modal fade" tabindex="-1" role="dialog" id="rhnModal"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">ACTION REQUIRED</h4></div><div class="modal-body"><p><strong>Migrate to Red Hat Subscription Management</strong></p><p>You have systems registered to RHN that need to migrate to RHSM.</p><p>Red Hat is transitioning from the Red Hat Network (RHN) hosted interface to the Red Hat Subscription Management (RHSM) interface in July 2017.</p><p><strong>Take action:</strong><br><a href="/products/red-hat-subscription-management/#migration" class="cta-link">Learn how to migrate</a></p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';o&&(a<t||e<=a||"true"!==i&&d.get("/api/flagged-accounts").then(function(t){t.flagged&&(d("body").append(s),d("#rhnModal").modal("show").on("shown.bs.modal",function(){localStorage.setItem(n,!0)}))}))})});
//# sourceMappingURL=rhn-modal.js.map