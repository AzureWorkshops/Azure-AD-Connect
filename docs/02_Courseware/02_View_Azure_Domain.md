## Objective
This next objective is very small.  We simply want to verify our Azure AD domain settings.

## Verify the Domain
If you are not currently at dashboard within the Azure portal, go ahead and close all blades.

  1. On the left menu, you should see **Azure Active Directory** <img src="../images/azure_ad_icon.jpg" style="display: inline; margin:0px 5px;box-shadow: 2px 2px 2px #999;border:1px solid #ccc;"/>. Click it.

  2. On the left, in the newly expanded Azure Active Directory menu, click on **Domain names** <img src="../images/domain_names_icon.jpg" style="display: inline; margin:0px 5px;box-shadow: 2px 2px 2px #999;border:1px solid #ccc;"/>.

  3. You should see your Office 365 domain name listed and set as _Primary_.

You may notice, at this point, that if we wanted to add a custom FQDN to Azure AD (e.g. _yourcompany.com_), we could do so here by selecting the **Add domain name** <img src="../images/add_icon.jpg" style="display: inline; margin:0px 5px;box-shadow: 2px 2px 2px #999;border:1px solid #ccc;"/> item from the _Actions_ menu at the top.

After we added our custom FQDN, we would be required to verify our ownership of the domain by adding a TXT DNS record.  Once we completed the verification process, we could then choose to set our custom domain as _Primary_.

Understand that the _Primary_ domain is **not** the only domain we can synchronize with our on-premises domain.  In the case that, let's say, we have multiple business units that have their own Accounts Domain, we could have multiple subdomains listed here.  Then, each business unit's AD would sync with its respective subdomain in Azure AD.

For our workshop, the Office 365 domain (e.g. _&lt;yourcompany&gt;_.onmicrosoft.com) is sufficient.