<?php

namespace Sequenzy\Types;

enum EmailBlockType: string
{
    case Text = "text";
    case Html = "html";
    case Heading = "heading";
    case List_ = "list";
    case Button = "button";
    case Spacer = "spacer";
    case Divider = "divider";
    case Image = "image";
    case Columns = "columns";
    case Group = "group";
    case ConditionalGroup = "conditional-group";
    case Repeat = "repeat";
    case Card = "card";
    case Cta = "cta";
    case Social = "social";
    case Logo = "logo";
    case Header = "header";
    case Footer = "footer";
    case Video = "video";
    case Product = "product";
    case DiscountCode = "discount-code";
    case Code = "code";
    case Countdown = "countdown";
    case Hero = "hero";
    case Testimonial = "testimonial";
    case Gallery = "gallery";
    case Badge = "badge";
    case Table = "table";
    case Features = "features";
    case ImageCard = "image-card";
    case Pricing = "pricing";
    case Author = "author";
    case Article = "article";
    case Rating = "rating";
    case Stats = "stats";
    case Steps = "steps";
    case ProductGrid = "product-grid";
    case Poll = "poll";
}
