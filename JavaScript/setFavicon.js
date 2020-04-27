const setFavicon = (url) => {
  const favicon = document.querySelector('link[rel="icon"]');
  if (favicon) {
    favicon.url = url;
  } else {
    const link = document.createElement('link');
    link.rel = 'icon';
    link.href = url;

    document.head.appendChild(link);
  }
};

setFavicon('/path/to/user/profile/icon.ico');
