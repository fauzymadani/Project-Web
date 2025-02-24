## Subresource Integrity

If you are loading Highlight.js via CDN you may wish to use [Subresource Integrity](https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity) to guarantee that you are using a legimitate build of the library.

To do this you simply need to add the `integrity` attribute for each JavaScript file you download via CDN. These digests are used by the browser to confirm the files downloaded have not been modified.

```html
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/highlight.min.js"
  integrity="sha384-pGqTJHE/m20W4oDrfxTVzOutpMhjK3uP/0lReY0Jq/KInpuJSXUnk4WAYbciCLqT"></script>
<!-- including any other grammars you might need to load -->
<script
  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/languages/go.min.js"
  integrity="sha384-Mtb4EH3R9NMDME1sPQALOYR8KGqwrXAtmc6XGxDd0XaXB23irPKsuET0JjZt5utI"></script>
```

The full list of digests for every file can be found below.

### Digests

```
sha384-no5/zgQGupzPFGWV8VpJzfQau5/GI2v5b7I45l6nKc8gMOxzBHfgyxNdjQEnmW94 /es/languages/bash.js
sha384-u2nRnIxVxHkjnpxFScw/XgxNVuLz4dXXiT56xbp+Kk2b8AuStNgggHNpM9HO569A /es/languages/bash.min.js
sha384-qimhSkVWof5rfaFajQk8KAtzSRYyIArcJCMKWdDcNq34F4uplk08wmEyUiYLmO+3 /es/languages/c.js
sha384-5fESKgrRcGs7I/89bn7NKFcHyvIVcmQIG4JfCEAV5Rg5VVtskrmGkHVOIsD1642v /es/languages/c.min.js
sha384-VYwyP5ddOUunx1AGpbtE38OKY2PbjW9kk6X6622tvqprRJk6W8/tgMvI7MqaOZZw /es/languages/shell.js
sha384-gRgqaIgHrAR1qlo866rkV1AUahqopv0dnpFFLAC4X3jYTDagRCTxQBTMFGV1+x1U /es/languages/shell.min.js
sha384-4SbTAv3AX2fuPCpSv6HW3p07YgA7hFfcwG2zJHtYv0ATIt1juD3IXj2NSYwTeIpm /languages/bash.js
sha384-83HvQQdGTWqnRLmgm19NjCb1+/awKJGytUX9sm3HJb2ddZ9Fs1Bst2bZogFjt9rr /languages/bash.min.js
sha384-WHdxyD51Y+ytDdcYGVkKHQOThUwwhLl/1GvZxHTHL4ImI4NS32L/B8bvB/1zN/Mk /languages/c.js
sha384-jtwnwOYA+K4zYN55fA4z4U0PTK5oEp4RcLYaXkYRKO3UUzge1o21ArmvKmTRdh/d /languages/c.min.js
sha384-KYOeDvyFo8fJObDV1L1aoPnfs6XG68LL6j3INM7McXyRYtBZF7DdUsNjK25dtxKo /languages/shell.js
sha384-olAuUjfRvTi/iEH4RXRpaq/G1iJGizn7OefkyJLQYuqNhh1xAV5dnUrkH/LlPd9j /languages/shell.min.js
sha384-dPu2W0AQSWSCQcuhw6Cdv358XVghpEX6IP4o0Ja0SrJFarunROUc+N0lx/Cuvuof /highlight.js
sha384-AfBSeZloYsSuu7CSju+LZc4UEk0I3Obb395o51uMMpcBzIptuzvHT/BSm7r+joI2 /highlight.min.js
```

