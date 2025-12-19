<!DOCTYPE html>

<html lang="zxx">

<!-- Begin Head -->

<head>
    <title>{{sitename()}}</title>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-family  -->


    <style type="text/css">
        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/100/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/100/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/100/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/200/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/200/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/200/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/300/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/300/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/300/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/400/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/400/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/400/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/500/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/500/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/500/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/600/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/600/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/600/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/700/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/700/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/700/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/800/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/800/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/800/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/900/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/900/normal.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: normal;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/900/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/100/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/100/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/100/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/200/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/200/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 200;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/200/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/300/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/300/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/300/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/400/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/400/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/400/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/500/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/500/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 500;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/500/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/600/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/600/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 600;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/600/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/700/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/700/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/700/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/800/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/800/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 800;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/800/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/vietnamese/900/italic.woff2);
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin/900/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Barlow;
            font-style: italic;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/barlow/5.0.11/latin-ext/900/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/100/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/100/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/300/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/300/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/400/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/400/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/700/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/700/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/900/normal.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: normal;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/900/normal.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/100/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 100;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/100/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/300/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 300;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/300/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/400/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 400;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/400/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/700/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 700;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/700/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin-ext/900/italic.woff2);
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            font-display: swap;
        }

        @font-face {
            font-family: Lato;
            font-style: italic;
            font-weight: 900;
            src: url(../../../../cf-fonts/s/lato/5.0.18/latin/900/italic.woff2);
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            font-display: swap;
        }
    </style>
    <style>
        /* ===== LOADER CSS ===== */
        .ss-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ss-spin img {
            width: 80px;
            height: auto;
        }
    </style>
    <!-- custom css link -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/responsive.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{asset('')}}assets/images/favicon.png">
</head>

<body>
    <!------------- Loader start ----------->
    <div class="ss-loader">
        <div class="ss-spin">
            <img src="{{asset('')}}assets/images/loader.gif" alt="loader">
        </div>
    </div>



    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-lg-12 col-md-12 col-sm-12 col-12">


            <form action="{{ route('register') }}" method="POST" class="mx-auto" style="max-width: 500px;">

                {{ csrf_field() }}

                <!-- SweetAlert2 CDN -->

                <div class="ss-contact-form">
                    <div class="ss-logo text-center">
                        <a href="{{route('Index')}}"><img src="{{asset('')}}assets/images/Logo.png"></a>
                    </div>
                    <h3 class="ss-title text-center" style="margin: 30px 0;">Register</h3>

                    <div class="ss-form-input">
                        <input type="text" name="sponsor" class="form-control" placeholder="Enter Your sponsor ID">
                    </div>

                    <div class="ss-form-input">
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="ss-form-input">
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <div class="ss-form-input">
                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="ss-form-input">
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                    </div>
                    <div class="ss-form-input">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="ss-btn ss-con-btn">Register</button>
                    </div>
                    <div class="text-center mt-3">
                      <p>Already have an account?  <a href="{{ route('login') }}" style="color: green;"> Login here.</a></p> 
                </div>

            </form>
            @include('partials.notify')

        </div>

    </div>




    <!------------- footer Section start ----------->
    <div class="ss-footer-section">
        <div class="container-fluid">


        </div>
    </div>
    <!------------- footer Section end ----------->
    <!------------- copyright Section start ----------->

    <!------------- copyright Section end ----------->
    <!------------- Modal-body Section end ----------->
    <div class="modal fade ss-sharemodal" id="modalshare" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="false" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Share Us On</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="ss-modal-icon">
                        <li><a href="javascript:void(0)">
                                <span>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.31742 6.77491L15.1457 0H13.7646L8.70389 5.88256L4.66193 0H0L6.11224 8.89547L0 16H1.3812L6.72542 9.78782L10.994 16H15.656L9.31709 6.77491H9.31742ZM7.42569 8.97384L6.80639 8.08805L1.87886 1.03974H4.00029L7.97687 6.72795L8.59617 7.61374L13.7652 15.0075H11.6438L7.42569 8.97418V8.97384Z"
                                            fill="#8F8F8F" />
                                    </svg>

                                </span>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <span class="">
                                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.06741 18V9.78996H8.82207L9.23536 6.58941H6.06741V4.54632C6.06741 3.61998 6.32359 2.98869 7.65347 2.98869L9.34686 2.98799V0.125307C9.05401 0.0872508 8.04877 0 6.87877 0C4.43564 0 2.76302 1.49127 2.76302 4.22934V6.58941H0V9.78996H2.76302V18H6.06741Z"
                                            fill="#8F8F8F" />
                                    </svg>

                                </span>
                            </a></li>
                        <li><a href="javascript:void(0)"> <span>
                                    <svg width="18" height="13" viewBox="0 0 18 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.6025 0H3.3975C1.5075 0 0 1.53 0 3.3975V9.45C0 11.34 1.53 12.8475 3.3975 12.8475H14.6025C16.4925 12.8475 18 11.3175 18 9.45V3.3975C18 1.53 16.47 0 14.6025 0ZM6.6375 9.2025V3.6675L11.3625 6.435L6.6375 9.2025Z"
                                            fill="#8F8F8F" />
                                    </svg>

                                </span>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <span class="svg-mt4">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 18V11.4075C18 8.1675 17.3025 5.6925 13.5225 5.6925C11.7 5.6925 10.485 6.6825 9.99 7.6275H9.945V5.985H6.3675V18H10.1025V12.0375C10.1025 10.4625 10.395 8.955 12.33 8.955C14.2425 8.955 14.265 10.7325 14.265 12.1275V17.9775H18V18ZM0.2925 5.985H4.0275V18H0.2925V5.985ZM2.16 0C0.9675 0 0 0.9675 0 2.16C0 3.3525 0.9675 4.3425 2.16 4.3425C3.3525 4.3425 4.32 3.3525 4.32 2.16C4.32 0.9675 3.3525 0 2.16 0Z"
                                            fill="#8F8F8F" />
                                    </svg>

                                </span>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <span class="svg-mt1">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.99981 5.69922C7.17821 5.69922 5.69861 7.17882 5.69861 9.00042C5.69861 10.822 7.17821 12.3052 8.99981 12.3052C10.8214 12.3052 12.3046 10.822 12.3046 9.00042C12.3046 7.17882 10.8214 5.69922 8.99981 5.69922Z"
                                            fill="#8F8F8F" />
                                        <path
                                            d="M13.9824 0H4.0176C1.8036 0 0 1.8036 0 4.0176V13.9824C0 16.2 1.8036 18 4.0176 18H13.9824C16.2 18 18 16.2 18 13.9824V4.0176C18 1.8036 16.2 0 13.9824 0ZM9 14.832C5.7852 14.832 3.168 12.2148 3.168 9C3.168 5.7852 5.7852 3.1716 9 3.1716C12.2148 3.1716 14.832 5.7852 14.832 9C14.832 12.2148 12.2148 14.832 9 14.832ZM14.9544 4.23C14.274 4.23 13.7196 3.6792 13.7196 2.9988C13.7196 2.3184 14.274 1.764 14.9544 1.764C15.6348 1.764 16.1892 2.3184 16.1892 2.9988C16.1892 3.6792 15.6348 4.23 14.9544 4.23Z"
                                            fill="#8F8F8F" />
                                    </svg>

                                </span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!------------- Modal-body Section end ----------->

    <!-- custom link  -->
    <script src="{{asset('')}}assets/js/jquery.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/bootstrap.bundle.min.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/select2.min.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/SmoothScroll.min.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/flatpickr.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/vanilla-tilt.min.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/swiper-bundle.min.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script src="{{asset('')}}assets/js/custom.js" type="0b2f97e28051c8901cf0b4a3-text/javascript"></script>
    <script type="">
        const popup = document.getElementById("popup");
        const close = document.getElementById("close");
        const videoPopup1 = document.getElementById("videopopup1");

        popup.addEventListener("click", () => {
            videoPopup1.style.display = "block";
            $('body').css("overflow", "hidden");
        });
        close.addEventListener("click", () => {
            videoPopup1.style.display = "none";
            $('body').css("overflow", "auto");
        });


    </script>
    <!------------- Header Section End ----------->
    <script data-cfasync="false">
        window.addEventListener("load", function() {
            var loader = document.querySelector(".ss-loader");
            if (loader) {
                loader.style.transition = "opacity 0.5s ease";
                loader.style.opacity = "0";
                setTimeout(function() {
                    loader.style.display = "none";
                }, 500);
            }
        });
    </script>

</html>