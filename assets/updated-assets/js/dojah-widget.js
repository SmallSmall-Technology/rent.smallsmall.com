const spinnerHtml = `
<div class="connect__spinner">
  <div class="connect__spinner__bar1"></div>
  <div class="connect__spinner__bar2"></div>
  <div class="connect__spinner__bar3"></div>
  <div class="connect__spinner__bar4"></div>
  <div class="connect__spinner__bar5"></div>
  <div class="connect__spinner__bar6"></div>
  <div class="connect__spinner__bar7"></div>
  <div class="connect__spinner__bar8"></div>
  <div class="connect__spinner__bar9"></div>
  <div class="connect__spinner__bar10"></div>
  <div class="connect__spinner__bar11"></div>
  <div class="connect__spinner__bar12"></div>
</div>
`;

const styles = `
#connect__overlay {
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.7);
  opacity: 0;
  pointer-events: none;
  z-index: 10000
}

#connect__modal {
  background: white;
  position: fixed;
  top: 50%;
  left: 50%;
  transition: ease-in-out 0.4s;
  display: none;
  z-index: 100000;
  border-radius: 10px;
}

#connect__iframe {
  border: none;
}

#connect__modal.active {
  display: block;
  transform: translate(-50%, -50%);
}

#connect__overlay.active {
  pointer-events: all;
  opacity: 1;
}

.connect__spinner {
  position: fixed;
  top: 40%;
  left: 50%;
  width: 40px;
  height: 40px;
  display: none;
  z-index: 100000;
}

.connect__spinner.active {
  display: inline-block;
  transform: translate(-50%, -50%);
}

.connect__spinner div {
  width: 6%;
  height: 16%;
  background: #fff;
  position: absolute;
  left: 49%;
  top: 43%;
  opacity: 0;
  -webkit-border-radius: 50px;
  -webkit-box-shadow: 0 0 3px rgba(0,0,0,0.2);
  -webkit-animation: fade 1s linear infinite;
}

@-webkit-keyframes fade {
  from {opacity: 1;}
  to {opacity: 0.25;}
}

.connect__spinner div.connect__spinner__bar1 {
  -webkit-transform:rotate(0deg) translate(0, -130%);
  -webkit-animation-delay: 0s;
}

.connect__spinner div.connect__spinner__bar2 {
  -webkit-transform:rotate(30deg) translate(0, -130%);
  -webkit-animation-delay: -0.9167s;
}

.connect__spinner div.connect__spinner__bar3 {
  -webkit-transform:rotate(60deg) translate(0, -130%);
  -webkit-animation-delay: -0.833s;
}

.connect__spinner div.connect__spinner__bar4 {
  -webkit-transform:rotate(90deg) translate(0, -130%);
  -webkit-animation-delay: -0.7497s;
}

.connect__spinner div.connect__spinner__bar5 {
  -webkit-transform:rotate(120deg) translate(0, -130%);
  -webkit-animation-delay: -0.667s;
}

.connect__spinner div.connect__spinner__bar6 {
  -webkit-transform:rotate(150deg) translate(0, -130%);
  -webkit-animation-delay: -0.5837s;
}

.connect__spinner div.connect__spinner__bar7 {
  -webkit-transform:rotate(180deg) translate(0, -130%);
  -webkit-animation-delay: -0.5s;
}

.connect__spinner div.connect__spinner__bar8 {
  -webkit-transform:rotate(210deg) translate(0, -130%);
  -webkit-animation-delay: -0.4167s;
}

.connect__spinner div.connect__spinner__bar9 {
  -webkit-transform:rotate(240deg) translate(0, -130%);
  -webkit-animation-delay: -0.333s;
}

.connect__spinner div.connect__spinner__bar10 {
  -webkit-transform:rotate(270deg) translate(0, -130%);
  -webkit-animation-delay: -0.2497s;
}

.connect__spinner div.connect__spinner__bar11 {
  -webkit-transform:rotate(300deg) translate(0, -130%);
  -webkit-animation-delay: -0.167s;
}

.connect__spinner div.connect__spinner__bar12 {
  -webkit-transform:rotate(330deg) translate(0, -130%);
  -webkit-animation-delay: -0.0833s;
}
`;
class Connect {
  constructor(options) {
    this.options = options;
    this.setup = this.setup.bind(this);
    this.open = this.open.bind(this);
    this.close = this.close.bind(this);
    this.destroy = this.destroy.bind(this);
    this.done = false;
  }

  setup() {
    const style = document.createElement("style");
    style.id = 'connect__style';
    style.innerHTML = styles;
    document.head.append(style);

    const overlay = document.createElement("div");
    overlay.id = "connect__overlay";
    document.body.append(overlay);

    const modal = document.createElement("div");
    modal.id = "connect__modal";
    document.body.append(modal);

    document.body.insertAdjacentHTML("beforeend", spinnerHtml);

    let widgetUrl;
    if (this.options.type) {
      widgetUrl =
        (this.options.type === "link" || this.options.type === "payment"
          ? 'https://connect.dojah.io'
          : 'https://identity.dojah.io') +
        "/" +
        this.options.type;
    } else {
      widgetUrl = 'https://connect.dojah.io' + "/link";
    }

    // Attach Event Listener
    const self = this;
    var callback, msg;
    msg = "message";
    callback = async function (e) {
      const { data, origin } = e;
      if (
        data &&
        (origin === 'https://connect.dojah.io' ||
          origin === 'https://identity.dojah.io')
      ) {
        if (!data.type) {
          console.log("Type was not provided.", e);
          return;
        }
        switch (data.type) {
          case "connect.widget.close":
            self.close();
            break;
          case "connect.account.success":
            self.options.onSuccess(data.response);
            setTimeout(function () {
              self.close();
            }, 1000);
            break;
          case "connect.account.error":
            self.options.onError(data.response);
            break;
          default:
            return self.options.onError(data.response);
        }
      }
    };
    window.addEventListener
      ? window.addEventListener(msg, callback, false)
      : window.attachEvent && window.attachEvent("on" + msg, callback);

    const config = this.options.config;
    const configKeys = config ? Object.keys(config) : [];

    const user_data = this.options.user_data;
    const userKeys = user_data ? Object.keys(user_data) : [];

    const gov_data = this.options.gov_data;
    const govDataKeys = gov_data ? Object.keys(gov_data) : [];

    const metadata = this.options.metadata;
    const metadataKeys = metadata ? Object.keys(metadata) : [];

    const location = this.options.__location;

    const reference_id = this.options.reference_id;

    const ifr = document.createElement("iframe");
    ifr.id = "connect__iframe";
    ifr.src = `${widgetUrl}?app_id=${this.options.app_id}&p_key=${this.options.p_key
      }${this.options.type === "payment" ? "&amount=" + this.options.amount : ""
      }${reference_id ? '&reference_id=' + JSON.stringify(reference_id) : ''
      }${configKeys
        .map(
          (key) =>
            `&${key}=${typeof config[key] === "object"
              ? JSON.stringify(config[key])
              : config[key]
            }`
        )
        .join("")}${metadataKeys
          .map(
            (key) =>
              `&metadata[${key}]=${typeof metadata[key] === "object"
                ? JSON.stringify(metadata[key])
                : metadata[key]
              }`
          )
          .join("")}${userKeys
            .map(
              (key) =>
                `&user_data[${key}]=${typeof user_data[key] === "object"
                  ? JSON.stringify(user_data[key])
                  : user_data[key]
                }`
            )
            .join("")}${govDataKeys
              .map(
                (key) =>
                  `&gov_data[${key}]=${typeof gov_data[key] === "object"
                    ? JSON.stringify(gov_data[key])
                    : gov_data[key]
                  }`
              )
              .join("")}${location ? '&location=' + JSON.stringify(location) : ''}`;
    ifr.width = window.innerWidth;
    ifr.height = window.innerHeight;
    ifr.allow = "camera; microphone; geolocation";
    ifr.onload = () => {
      this.done = true;
    };

    modal.appendChild(ifr);
  }

  open() {
    const overlay = document.querySelector("#connect__overlay");
    const modal = document.querySelector("#connect__modal");
    const spinner = document.querySelector(".connect__spinner");
    const ifr = document.querySelector("#connect__iframe");

    if (!overlay) {
      return setTimeout(() => {
        this.setup();
        this.open();
      });
    }

    spinner.classList.add("active");
    overlay.classList.add("active");

    if (this.done) {
      spinner.classList.remove("active");
      modal.classList.add("active");
    } else {
      ifr.onload = () => {
        spinner.classList.remove("active");
        modal.classList.add("active");
      };

      // If it doesn't fire in 1s start by force
      setTimeout(() => {
        spinner.classList.remove("active");
        modal.classList.add("active");
      }, 1000);
    }
  }

  close() {
    const overlay = document.querySelector("#connect__overlay");
    const modal = document.querySelector("#connect__modal");
    const ifr = document.querySelector("#connect__iframe");

    if (!overlay) {
      return setTimeout(() => {
        this.setup();
        this.close();
      });
    }

    overlay.classList.remove("active");
    modal.classList.remove("active");
    ifr.src = "";

    this.destroy();

    this.options.onClose();
  }

  destroy() {
    const overlay = document.querySelector("#connect__overlay");
    const modal = document.querySelector("#connect__modal");
    const ifr = document.querySelector("#connect__iframe");
    const style = document.querySelector("#connect__style");
    const spinner = document.querySelector(".connect__spinner");

    spinner.remove();
    style.remove();
    ifr.remove();
    modal.remove();
    overlay.remove();
  }

  static preload() {
    const __connect = new Connect({
      type: 'custom',
      config: {},
      onClose: function () { },
      onError: function () {
        console.log('Preloaded!');
        __connect.close();
      },
    });
    __connect.setup();
  }
}

Connect.environment = 'production';

window.Connect = Connect;