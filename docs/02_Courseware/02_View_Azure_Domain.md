## Objective
This next objective is very small.  We simply want to verify our Azure AD domain settings and enable premium features.

## Verify the Domain
If you are not currently at dashboard within the Azure portal, go ahead and close all blades.

  1. On the left menu, you should see **Azure Active Directory** <img src="../images/azure_ad_icon.jpg" class="inline"/>. Click it.

  2. On the left, in the newly expanded Azure Active Directory menu, click on **Domain names** <img src="../images/domain_names_icon.jpg" class="inline"/>.

  3. You should see your Office 365 domain name listed and set as _Primary_.

You may notice, at this point, that if we wanted to add a custom FQDN to Azure AD (e.g. _yourcompany.com_), we could do so here by selecting the **Add domain name** <img src="../images/add_icon.jpg" class="inline"/> item from the _Actions_ menu at the top.

After we added our custom FQDN, we would be required to verify our ownership of the domain by adding a TXT DNS record.  Once we completed the verification process, we could then choose to set our custom domain as _Primary_.

Understand that the _Primary_ domain is **not** the only domain we can synchronize with our on-premises domain.  In the case that, let's say, we have multiple business units that have their own Accounts Domain, we could have multiple subdomains listed here.  Then, each business unit's AD would sync with its respective subdomain in Azure AD.

For our workshop, the Office 365 domain (e.g. _&lt;yourcompany&gt;_.onmicrosoft.com) is sufficient.

## Enable Premium Features
Even though we are using a trial of Office 365 Business Premium for our workshop, Azure AD Premium is a different SKU.  We, therefore, have to enable the features before we can use them.

  1. While still in _Azure Active Directory_, click on the **Licenses** <img src="../images/licensing_icon.jpg" class="inline"/> menu item.

  2. In the next menu, click on the **All products** <img src="../images/licensing_icon.jpg" class="inline"/> menu item.

  3. On the next page, in the _Actions_ section, click on **Try / Buy** <img src="../images/add_icon.jpg" class="inline"/>.

  4. You will now see two options for enabling premium features - **Azure AD Premium** and **Enterprise Mobility Suite**.  For our workshop, **Azure AD Premium** is sufficient. Click on **Free trial** in the **Azure AD Premium** tile.

  5. This will initiate a 30-day trial of Azure AD Premium features. Click _Activate_.

You will need to refresh your Internet browser to see the effects of enabling Azure AD Premium.  Within the Azure Active Directory blades, you may have noticed a gray bar stating that some of the features were only available in Azure AD Premium.  Once you refresh your browser and return to Azure Active Directory, you should no longer see the gray bar and, instead, see all features activated.