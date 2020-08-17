plist地址一定要用https，不然会下载不成功

```xml

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
    <dict>
        <key>items</key>
        <array>
            <dict>
                <key>assets</key>
                <array>
                    <dict>
                        <key>kind</key>
                        <string>software-package</string>
                        <key>url</key>
                        <!-- 注意：IPA文件URL -->
                        <string>https://img.cdsfl8888.com/duoduo20200813_v160.ipa</string>
                    </dict>
                    <dict>
                        <key>kind</key>
                        <string>display-image</string>
                        <key>needs-shine</key>
                        <true/>
                        <key>url</key>
                        <!-- 注意：应用程序icon url, 57x57 -->
                        <string>https://img.cdsfl8888.com/duoduo_icon_download.png</string>
                    </dict>
                </array>
                <key>metadata</key>
                <dict>
                    <key>bundle-identifier</key>
                    <!-- 注意：应用程序identifier -->
                    <string>com.ISENL.bibi</string>
                    <key>bundle-version</key>
                    <string>1.4.3</string>
                    <key>kind</key>
                    <string>software</string>
                    <key>subtitle</key>
                    <string>1000万人都在连麦开黑</string>
                    <key>title</key>
                    <!-- 注意：应用程序名称 -->
                    <string>多多语音-专业语音游戏陪玩平台</string>
                </dict>
            </dict>
        </array>
    </dict>
</plist>

```

用a标签的指向plist地址即可

```html
<a class="down-load update" href="itms-services://?action=download-manifest&url=https://www.feiyan888.com/app.plist">下载</a>

```